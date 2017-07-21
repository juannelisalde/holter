<?php
	/**
	* Clase modelo de parametros
	*
	* @package Models
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class parametros
	*/
	class M_Parametros extends CI_Model{
		/**
	    * Private array form data
	    * @var form_data
	    */
		private $form_data;

		/**
		* Metodo constructor
		* Inicializa el objeto form_data el cual contiene los atributos de la clase
		* @param array form_data datos obtenidos de la vista
		*/
		function construct(array $form_data){
			extract($form_data);
			$this->form_data = array(
				"frecardiacamin"=>isset($frecardiacamin) ? $frecardiacamin : null,
				"frecardiacamax"=>isset($frecardiacamax) ? $frecardiacamax : null,
			);
		}

		/**
		* Metodo insert
		* Metodo que inserta los parametros que se van a usar como base para los calculos
		* @return array mensaje
		*/
		function insert(){
			try{
				$this->db->set('fecha_creacion', 'NOW()', FALSE);
				$this->db->insert('parametros', $this->form_data);
				return array("message"=>"ok");
			} catch (Exception  $e){
				return array("message"=>"error");
			}
		}

		/**
		* Metodo consult
		* Metodo que consulta de la base de datos los parametros existentes
		* @return array con datos encontrados
		*/
		public function consult(){
			$query = $this->db->get_where("parametros");
			return $query->result();
		}
	}
?>