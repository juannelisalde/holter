<?php
	/**
	* Class login controlator
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class login
	*/
	class Login extends CI_Controller {
		/**
		* Method construct
		* Load and initializes model, functions librarie and email libraries
		*/
		public function __construct(){
			parent::__construct();
			$this->load->library('send_email');
			$this->load->library('functions');
			$this->load->model("M_Usuarios");
			$this->M_Usuarios->construct($this->input->post());
		}

		/**
		* Method index
		* Load and show views login
		*/
		public function index(){
			$this->load->view("login/login");
			$this->load->view("login/login_js");
		}

		/**
		* Method login
		* Validate if user exists and initializes session
		*/
		public function login(){
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

			$response = $this->M_Usuarios->consult();
			if(count($response) == 0){
				$this->functions->message_json(array("message"=>"No Existe Usuario"));
			}
			
			$user = array(
				"id_usuario" => $response[0]->id_usuario,
				"nombres" => $response[0]->nombres,
				"apellidos" => $response[0]->apellidos,
				"email" => $response[0]->email,
				"tipo_usuario" => $response[0]->tipo_usuario,
			);
			$this->session->set_userdata($user);
			$this->functions->message_json(array("message"=>"ok","data"=>$response));
		}

		/**
		* Method login
		* Validate if user exists and initializes session
		*/
		public function user(){
			$fields = array(
				array(
					"email",
				),
				array(
					"Correo",
				),
				array(
					"email",
				),
			);
			$response = $this->functions->validate_fields($fields, $this->input->post());
			if($response["message"] != "ok"){
				$this->functions->message_json($response);
			}

			$response = $this->M_Usuarios->consult();
			if(count($response) == 0){
				$this->functions->message_json(array("message"=>"No Existe Usuario"));
			}
			
			$this->functions->message_json(array("message"=>"ok", "data"=>$response[0]->id_usuario));
		}

		/**
		* Method send email
		* Send email for the user to retrieve the password
		*/
		public function send_email(){
			$fields = array(
				array(
					"email",
				),
				array(
					"Correo",
				),
				array(
					"email",
				),
			);
			$response = $this->functions->validate_fields($fields, $this->input->post());
			if($response["message"] != "ok"){
				$this->functions->message_json($response);
			}

			if($this->input->post("email" !== null) || !strlen(trim($this->input->post("email")))){
				$this->functions->message_json(array("message"=>"Debe Digitar Correo Correo"));
			}

			$http = (strtoupper(substr($_SERVER["SERVER_PROTOCOL"],0,5)) == "HTTPS") ? "https" : "http";
			$message = "Este Correo Es Para Recuperar La Contraseña, \n
			Por favor 
			<a href='" . $http . "://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/CI/recuperar_pass?id_usuario=" . $this->input->post("id_usuario") . "&email=" . $this->input->post("email") . "'>Olvido Contraseña</a>";
			
			$this->send_email->send($this->input->post("email"), "Recuperar Contraseña", $message);
			

			$this->M_Usuarios->insert_token();

			$this->functions->message_json(array("message"=>"ok"));
		}

		/**
		* Method that close session user
		*/
		public function sign_off(){
			$this->session->sess_destroy();
			redirect("login");
		}
	}
?>