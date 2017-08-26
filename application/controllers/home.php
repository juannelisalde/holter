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

	/**
	* Class home
	*/
	class home extends CI_Controller{
		/**
		* Method construct
		* Load and initializes model, functions librarie and email libraries
		*/
		public function __construct(){
			parent::__construct();
			$this->load->library('functions');
			$this->functions->validate_session();
			$this->load->model("M_Parametros");
		}

		/**
		* Method index
		* Load and show views login
		*/
		public function index(){
			$parameters = $this->M_Parametros->get_parameters();
			$parameters[0]->name = $this->session->userdata["nombres"];
			$parameters[0]->lastname = $this->session->userdata["apellidos"];
			$html = "";
			if($this->session->userdata["tipo_usuario"] == "ADMIN"){
				$html = '<li role="separator" class="divider"></li>
          <li><a href="usuarios">
          	<i class="glyphicon glyphicon-user"></i> Perfil</a>
          </li>
          <li>
          	<a href="parametros"><i class="glyphicon glyphicon-cog"></i> Configuración de sistema</a>
          </li>';
			}
			$this->load->view("header", array("html"=>$html));
			$this->load->view("home/home", (array)$parameters[0]);
			$this->load->view("home/home_js", (array)$parameters[0]);
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
						if(!is_numeric($value) || !strlen(trim($value)) || $value <= 0){
							$errors[] = array(
								"line"=>$cont,
								"error"=>"Debe Digitar Valor Numerico Mayor A Cero (" . $value . ")",
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