<?php
	/**
	* Class users controlator
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class users
	*/
	class Usuarios extends CI_Controller {
		/**
		* Method construct
		* Load and initializes model and functions librarie
		*/
		public function __construct(){
			parent::__construct();
			$this->load->library('functions');
			$this->functions->validate_session();
			$this->load->model("M_Usuarios");
			$this->M_Usuarios->construct($this->input->post());
		}

		/**
		* Method index
		* Load and show views users
		*/
		public function index(){
			$this->load->view("usuarios/usuarios");
			$this->load->view("usuarios/usuarios_js");
		}

		/**
		* Method consult
		* Get users
		*/
		public function consult(){
			extract($this->input->post());
			$response = $this->M_Usuarios->consult($this->input->post());
			if(count($response) == 0){
				$this->functions->message_json(array("message"=>"No Existe Usuario"));
			}
			$this->functions->message_json(array("message"=>"ok","data"=>$response));
		}

		/**
		* Method insert
		* Insert data user
		*/
		public function insert(){
			$fields = array(
				array(
					"nombres",
					"apellidos",
					"email",
					"pass",
					"tipo_usuario",
				),
				array(
					"Nombres",
					"Apellidos",
					"Correo",
					"Contraseña",
					"Tipo De Usuario",
				),
				array(
					"varchar",
					"varchar",
					"email",
					"varchar",
					"varchar",
				),
			);
			$response = $this->functions->validate_fields($fields, $this->input->post());
			if($response["message"] != "ok"){
				$this->functions->message_json($response);
			}

			$response = $this->M_Usuarios->insert($this->input->post());
			$this->functions->message_json($response);
		}

		/**
		* Method recover pass
		* Set pass user
		*/
		public function recover_pass(){
			$fields = array(
				array(
					"email",
					"pass",
				),
				array(
					"Correo",
					"Contraseña",
				),
				array(
					"email",
					"varchar",
				),
			);
			$response = $this->functions->validate_fields($fields, $this->input->post());
			if($response["message"] != "ok"){
				$this->functions->message_json($response);
			}

			$response = $this->M_Usuarios->recover_pass($this->input->post());
			$this->functions->message_json($response);
		}
	}
?>