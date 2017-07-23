<?php
	/**
	* Class home controlator
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class home
	* Show view by default
	*/
	class home extends CI_Controller{
		public function index(){
			$this->load->view("holter/usuarios/usuarios");
		}
	}
?>