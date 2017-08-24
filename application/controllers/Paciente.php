<?php
	/**
	* Class patients controlator
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class patient
	*/
	class Paciente extends CI_Controller {
		/**
		* Method construct
		* Load and initializes model and functions librarie
		*/
		public function __construct(){
			parent::__construct();
			$this->load->library('functions');
			$this->functions->validate_session();
			$this->load->model("M_Paciente");
			$this->load->model("M_Parametros");
			$this->M_Paciente->construct($this->input->post());
		}

		/**
		* Method index
		* Load and show views patients
		*/
		public function index(){
			$parameters = $this->M_Parametros->get_parameters();
			$this->load->view("header");
			$this->load->view("paciente/paciente");
			$this->load->view("paciente/paciente_js", (array)$parameters[0]);
		}

		/**
		* Method consult
		* Get patient
		*/
		public function consult(){
			$response = $this->M_Paciente->consult();
			if(count($response) == 0){
				$this->functions->message_json(array("message"=>"No Existe Paciente"));
			}
			$this->functions->message_json(array("message"=>"ok","data"=>$response));
		}

		/**
		* Method insert
		* Insert data patient
		*/
		public function insert(){
			$fields = array(
				array(
					"tipodocum_id_tipodocum",
					"documento",
					"nombres",
					"apellidos",
					"fecha_nacimiento",
					"genero",
					"telefono",
					"celular",
					"email",
					"direccion",
				),
				array(
					"Tipo De Documento",
					"Documento",
					"Nombres",
					"Apellidos",
					"Fecha De Nacimiento",
					"Genero",
					"Telefono",
					"Celular",
					"Email",
					"Direccion",
				),
				array(
					"integer",
					"varchar",
					"varchar",
					"varchar",
					"varchar",
					"varchar",
					"varchar",
					"varchar",
					"email",
					"varchar",
				),
			);
			$response = $this->functions->validate_fields($fields, $this->input->post());
			if($response["message"] != "ok"){
				$this->functions->message_json($response);
			}
			
			$response = $this->M_Paciente->insert();
			$this->functions->message_json($response);
		}

		/**
		* Method get document
		* Get document types
		*/
		public function get_document(){
			$response = $this->M_Paciente->get_document();
			if(count($response) == 0){
				$this->functions->message_json(array("message"=>"No Se Ha Creado Documento"));
			}
			$this->functions->message_json(array("message"=>"ok","data"=>$response));
		}

		/**
		* Method save_meditation
		* save information of user meditation
		*/
		public function save_meditation(){

			//die();

			$fields = array(
				array(
				    "paciente_id_paciente",
				    "parametros_id_parametro",
				    "frecuencia_min",
				    "frecuencia_max",
				    "date_ini",
				    "time_ini",
				),
				array(
				    "Paciente",
				    "ID parámetro",
				    "frecuencia mínima",
				    "frecuencia máxima",
				    "Fecha inicial",
				    "Hora inicial",
				),
				array(
					"integer",
					"integer",
					"integer",
					"integer",
					"varchar",
					"varchar",
				),
			);


			$response = $this->functions->validate_fields($fields, $this->input->post());
			if($response["message"] != "ok"){
				$this->functions->message_json($response);
			}

			$response = $this->M_Paciente->save_meditation();

			$this->functions->message_json($response);

			//extract($this->input->post());

		}
	}
?>