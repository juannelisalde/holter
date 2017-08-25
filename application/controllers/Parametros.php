<?php
	/**
	* Class parameters controlator
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class parameters
	*/
	class Parametros extends CI_Controller {
		/**
		* Method construct
		* Load and initializes model and functions librarie
		*/
		public function __construct(){
			parent::__construct();

			if($this->session->id_usuario == null || $this->session->tipo_usuario != "ADMIN"){
				redirect("login");
			}

			$this->load->library('functions');
			$this->load->model("M_Parametros");
			$this->M_Parametros->construct($this->input->post());
		}

		/**
		* Method index
		* Load and show views users
		*/
		public function index(){
			$html = "";
			if($this->session->userdata["tipo_usuario"] == "ADMIN"){
				$html = '<li role="separator" class="divider"></li>
          <li><a href="usuarios">
          	<i class="glyphicon glyphicon-user"></i> Perfil</a>
          </li>
          <li>
          	<a href="parametros"><i class="glyphicon glyphicon-cog"></i> Configuración de sistema</a>
          </li>';
			}
			$this->load->view("header", array("html"=>$html));
			$this->load->view("parametros/parametros");
			$this->load->view("parametros/parametros_js");
		}

		/**
		* Method consult
		* Get parameters
		*/
		public function consult(){
			$response = $this->M_Parametros->consult($this->input->post());
			if(count($response) == 0){
				$this->functions->message_json(array("message"=>"No Existen Parametros"));
			}
			$this->functions->message_json(array("message"=>"ok","data"=>$response));
		}

		/**
		* Method insert
		* Insert parameters
		*/
		public function insert(){
			$fields = array(
				array(
					"frecardiacamin",
					"frecardiacamax",
				),
				array(
					"Frecuencia Minima",
					"Frecuencia Maxima",
				),
				array(
					"integer",
					"integer",
				),
			);
			$response = $this->functions->validate_fields($fields, $this->input->post());
			if($response["message"] != "ok"){
				$this->functions->message_json($response);
			}

			$response = $this->M_Parametros->insert($this->input->post());
			$this->functions->message_json($response);
		}
	}
?>
