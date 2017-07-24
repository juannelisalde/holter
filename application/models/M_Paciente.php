<?php
	/**
	* Class patient model
	*
	* @package Models
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class patient
	*/
	class M_Paciente extends CI_Model{
		/**
	    * Private array form data
	    * @var form_data
	    */
		private $form_data;

		/**
	    * Private integer patient id
	    * @var id_paciente
	    */
		private $id_paciente;

		/**
	    * Private integer patient document
	    * @var tipodocum_id_tipodocum
	    */
		private $tipodocum_id_tipodocum;

		/**
	    * Private string patient document
	    * @var documento
	    */
		private $documento;

		/**
		* Method constuct
		* Initialises attributes of the class
		* @param array form data
		*/
		function construct(array $form_data){
			extract($form_data);
			$this->form_data = array(
				"id_paciente" => isset($id_paciente) ? $id_paciente : null,
				"tipodocum_id_tipodocum" => isset($tipodocum_id_tipodocum) ? $tipodocum_id_tipodocum : null,
				"documento" => isset($documento) ? strtoupper($documento) : null,
				"nombres" => isset($nombres) ? strtoupper($nombres) : null,
				"apellidos" => isset($apellidos) ? strtoupper($apellidos) : null,
				"fecha_nacimiento" => isset($fecha_nacimiento) ? $fecha_nacimiento : null,
				"genero" => isset($genero) ? strtoupper($genero) : null,
				"telefono" => isset($telefono) ? strtoupper($telefono) : null,
				"celular" => isset($celular) ? strtoupper($celular) : null,
				"email" => isset($email) ? $email : null,
				"direccion" => isset($direccion) ? strtoupper($direccion) : null,
			);

			$this->id_paciente = isset($id_paciente) ? $id_paciente : null;
			$this->tipodocum_id_tipodocum = isset($tipodocum_id_tipodocum) ? $tipodocum_id_tipodocum : null;
			$this->documento = isset($documento) ? strtoupper($documento) : null;
		}

		/**
		* Method insert
		* Insert data patient
		* @return array message
		*/
		function insert(){
			$result = $this->consult();
			if(count($result) > 0){
				$this->form_data["id_paciente"] = $result[0]->id_paciente;
				$this->id_paciente = $result[0]->id_paciente;
				return $this->update();
			}

			try{
				$this->db->insert('paciente', $this->form_data);
				return array("message"=>"ok");
			} catch (Exception  $e){
				return array("message"=>"error");
			}
		}

		/**
		* Method update
		* Update patient data
		* @return array mensaje
		*/
		public function update(){
			try{
				$this->db->where(array("id_paciente"=>$this->id_paciente));
        		$this->db->update("paciente", $this->form_data);
				return array("message"=>"ok");
			} catch (Exception  $e){
				return(array("message"=>"error: $e"));
			}
		}

		/**
		* Method consult
		* Get existing patients
		* @return array patients found
		*/
		public function consult(){
			$para = array("1"=>1);
			if($this->tipodocum_id_tipodocum != null){
				$para["tipodocum_id_tipodocum"] = $this->tipodocum_id_tipodocum;
			}
			if($this->documento != null){
				$para["documento"] = $this->documento;
			}
			
			$query = $this->db->get_where("paciente",$para);
			return $query->result();
		}

		/**
		* Method get_document
		* Get existing documents
		* @return array documents found
		*/
		public function get_document(){
			$query = $this->db->get_where("tipodocum");
			return $query->result();
		}
	}
?>