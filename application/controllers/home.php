<?php
	/**
	* Class home controlator
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class home
	* Show view by default
	*/


	if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
	require_once APPPATH."/third_party/PHPExcel/classes/PHPExcel.php";

	class home extends CI_Controller{
		/**
		* Method construct
		* Load and initializes model, functions librarie and email libraries
		*/
		public function __construct(){
			parent::__construct();
			$this->load->library('functions');
			$this->functions->validate_session();
		}
		/**
		* Method index
		* Load and show views login
		*/
		public function index(){
			$this->load->view("home/home");
			$this->load->view("home/home_js");
		}

		/**
		* Method excel
		* Validate file excel
		*/
		public function excel(){
			if(!isset($_FILES["file"])){
				$this->functions->message_json(array("message"=>"Debe Enviar Archivo De Excel 97-2003"));
			}
			$excel = PHPExcel_IOFactory::load($_FILES["file"]["tmp_name"]);
			
			$columns = $excel->getActiveSheet()->getHighestColumn();
			if($columns != "C"){
				$this->functions->message_json(array("message"=>"Archivo Debe Tener 3 Columnas"));
			}
			$rows = $excel->getActiveSheet()->getHighestRow();
			if($rows < 22){
				$this->functions->message_json(array("message"=>"Archivo Debe Tener 22 Filas"));
			}
			
			$cont = 0; 
			$errors = array();
			$data = array();
			$cell_collection = $excel->getActiveSheet()->toArray(null,true,true,true);
			foreach ($cell_collection as $cell) {
				if($cont > 0){
					$values = array();
					foreach ($cell as $key => $value) {
						$values[] = $value;
						if(!is_numeric($value) || !strlen(trim($value))){
							$errors[] = array(
								"line"=>$cont,
								"error"=>"Debe Digitar Valor Numerico (" . $value . ")",
							);
						}
					}
					$data[] = $values;
				}
				if($cont == 21){
					break;
				}
				$cont++;
			}
			if(count($errors) > 0){
				$this->functions->message_json(array("message"=>"Archivo Con Errores", "data"=>$errors));
			}else{
				$this->functions->message_json(array("message"=>"ok", "data"=>$data));
			}
		}
	}
?>