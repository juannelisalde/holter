<?php
	/**
	* Class recover password controlator
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class recover password
	*/
	class Recuperar_pass extends CI_Controller {
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
		* Load recover password views
		*/
		public function index(){
			$this->load->view("holter/recuperar_pass");
			$this->load->view("holter/recuperar_pass_js");
		}
	}
?>