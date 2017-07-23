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
		* Load and initialise model
		*/
		public function __construct(){
			parent::__construct();
			$this->load->model("M_Usuarios");
			$this->M_Usuarios->construct($_POST);
		}

		/**
		* Method index
		* Load login views
		*/
		public function index(){
			$this->load->view("holter/login");
			$this->load->view("holter/login_js");
		}

		/**
		* Method consult
		* Get user
		*/
		public function send_email(){
			die("hola con ". print_r($_POST));
		}
	}
?>