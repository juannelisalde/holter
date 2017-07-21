<?php
	/**
	* Clase contralador de usuarios
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class usuarios
	*/
	class Usuarios extends CI_Controller {
		/**
		* Metodo constructor
		* Carga carga e inicializa el modelo
		*/
		public function __construct(){
			parent::__construct();
			$this->load->model("M_Usuarios");
			$this->M_Usuarios->construct($_POST);
		}

		/**
		* Metodo index
		* Carga las vistas de usuario
		*/
		public function index(){
			$this->load->view("holter/usuarios");
			$this->load->view("holter/usuarios_js");
		}

		/**
		* Metodo consult
		* Obtiene los datos del usuario
		*/
		public function consult(){
			extract($_POST);
			$response = $this->M_Usuarios->consult($_POST);
			if(count($response) == 0){
				die(json_encode(array("message"=>"No Existe Usuario")));
			}
			die(json_encode(array("message"=>"ok","data"=>$response)));
		}

		/**
		* Metodo insert
		* Inserta o modifica los datos del usuario
		*/
		public function insert(){
			$response = $this->M_Usuarios->insert($_POST);
			die(json_encode($response));
		}
	}
?>