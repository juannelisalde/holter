<?php
	/**
	* Clase contralador de parametros
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class parametros
	*/
	class Parametros extends CI_Controller {
		/**
		* Metodo constructor
		* Carga carga e inicializa el modelo
		*/
		public function __construct(){
			parent::__construct();
			$this->load->model("M_Parametros");
			$this->M_Parametros->construct($_POST);
		}

		/**
		* Metodo index
		* Carga las vistas de parametros
		*/
		public function index(){
			$this->load->view("holter/parametros");
			$this->load->view("holter/parametros_js");
		}

		/**
		* Metodo consult
		* Obtiene los paramteros
		*/
		public function consult(){
			extract($_POST);
			$response = $this->M_Parametros->consult($_POST);
			if(count($response) == 0){
				die(json_encode(array("message"=>"No Existen Parametros")));
			}
			die(json_encode(array("message"=>"ok","data"=>$response)));
		}

		/**
		* Metodo insert
		* Inserta los parametros con los que se realizan los calculos
		*/
		public function insert(){
			$response = $this->M_Parametros->insert($_POST);
			die(json_encode($response));
		}
	}
?>
