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

			if($this->session->id_usuario == null){
				//redirect("holter/home");
			}

			$this->load->library('functions');
			$this->load->model("holter/M_Paciente");
			$this->M_Paciente->construct($this->input->post());
		}

		/**
		* Method index
		* Load and show views patients
		*/
		public function index(){
			$this->load->view("holter/paciente/paciente");
			$this->load->view("holter/paciente/paciente_js");
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
	}
?>