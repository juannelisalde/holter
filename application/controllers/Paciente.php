<?php
	/**
	* Clase contralador de paciente
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class paciente
	*/
	class Paciente extends CI_Controller {
		/**
		* Metodo constructor
		* Carga carga e inicializa el modelo
		*/
		public function __construct(){
			parent::__construct();
			$this->load->model("M_Paciente");
			$this->M_Paciente->construct($_POST);
		}

		/**
		* Metodo index
		* Carga las vistas de paciente
		*/
		public function index(){
			$this->load->view("holter/paciente");
			$this->load->view("holter/paciente_js");
		}

		/**
		* Metodo consult
		* Obtiene los datos del paciente
		*/
		public function consult(){
			$response = $this->M_Paciente->consult();
			if(count($response) == 0){
				die(json_encode(array("message"=>"No Existe Paciente")));
			}
			die(json_encode(array("message"=>"ok","data"=>$response)));
		}

		/**
		* Metodo insert
		* Inserta o modifica los datos del paciente
		*/
		public function insert(){
			$response = $this->M_Paciente->insert();
			die(json_encode($response));
		}
	}
?>