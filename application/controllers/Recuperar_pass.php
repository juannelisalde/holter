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
			$this->load->library('functions');
		}

		/**
		* Method index
		* Load recover password views
		*/
		public function index(){
			$this->load->view("recuperar_pass/recuperar_pass");
			$this->load->view("recuperar_pass/recuperar_pass_js");
		}
	}
?>