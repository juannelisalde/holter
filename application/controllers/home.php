<?php
	/**
	* Clase contralador home
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class home
	* Muestra la vista que se debe mostrar inicialmente
	*/
	class home extends CI_Controller{
		public function index(){
			$data["titulo"] = "login";
			$this->load->view("holter/usuarios");
		}
	}
?>