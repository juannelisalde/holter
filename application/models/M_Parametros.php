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
		* Method constuct
		* Initialises attributes of the class
		* @param array form data
		*/
		function construct(array $form_data){
			extract($form_data);
			$this->form_data = $form_data;
			$this->frecardiacamin = isset($frecardiacamin) ? $frecardiacamin : null;
			$this->frecardiacamax = isset($frecardiacamax) ? $frecardiacamax : null;
		}

		/**
		* Method insert
		* Insert parameters that are used as a basis for meditations
		* @return array message
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
		* Method consult
		* Get existing parameters
		* @return array parameters found
		*/
		public function consult(){
			$query = $this->db->get_where("parametros");
			return $query->result();
		}
	}
?>