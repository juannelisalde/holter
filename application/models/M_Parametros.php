<?php
	/**
	* Class parameters model
	*
	* @package Models
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class paramenters
	*/
	class M_Parametros extends CI_Model{
		/**
	    * Private array form data
	    * @var form_data
	    */
		private $form_data;

		/**
	    * Private integer minimal frecuency
	    * @var frecardiacamin
	    */
		private $frecardiacamin;

		/**
	    * Private integer maximun frecuency
	    * @var frecardiacamax
	    */
		private $frecardiacamax;

		/**
	    * Private integer maximun number row
	    * @var cantidadmediciones
	    */
		private $cantidadmediciones;

		/**
		* Method constuct
		* Initialises attributes of the class
		* @param array form data
		*/
		function construct(array $form_data){
			extract($form_data);
			$this->form_data = $form_data;
			$this->frecardiacamin = isset($frecardiacamin) ? $frecardiacamin : null;
			$this->frecardiacamax = isset($frecardiacamax) ? $frecardiacamax : null;
			$this->cantidadmediciones = isset($cantidadmediciones) ? $cantidadmediciones : null;
		}

		/**
		* Method insert
		* Insert parameters that are used as a basis for meditations
		* @return array message
		*/
		function insert(){
			try{
				$this->db->trans_start();
				$this->db->set('fecha_creacion', 'NOW()', FALSE);
				$this->db->insert('parametros', $this->form_data);
				$this->db->trans_complete();
				return array("message"=>"ok");
			} catch (Exception  $e){
				return array("message"=>"error");
			}
		}

		/**
		* Method consult
		* Get existing parameters
		* @return array parameters found
		*/
		public function consult(){
			$this->db->from("parametros");
			$query = $this->db->get();
			return $query->result();
		}

		/**
		* Method get parameters
		* Get last parameters register
		* @return array last parameter
		*/
		public function get_parameters(){
			$this->db->from("parametros");
			$this->db->limit(1);
			$this->db->order_by("id_parametro DESC");
			$query =  $this->db->get();
			return $query->result();
		}
	}
?>