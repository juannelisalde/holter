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
	    * Private array form data
	    * @var medition
	    */
		private $medition;

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

			$this->meditions = array(
			    "paciente_id_paciente"  => isset($paciente_id_paciente) ? $paciente_id_paciente : null,
			    "parametros_id_parametro"  => isset($parametros_id_parametro) ? $parametros_id_parametro : null,
			    "frecuencia_min"  => isset($frecuencia_min) ? $frecuencia_min : null,
			    "frecuencia_max"  => isset($frecuencia_max) ? $frecuencia_max : null,
			    "date_ini"  => isset($date_ini) ? $date_ini : 0,
			    "time_ini"  => isset($time_ini) ? $time_ini : 0,

			);

			$this->meditions["fecha_inicio"] = $this->meditions["date_ini"]." ".$this->meditions["time_ini"];
			unset($this->meditions["date_ini"]);
			unset($this->meditions["time_ini"]);

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
				$this->db->trans_start();
				$this->db->insert('paciente', $this->form_data);
				$this->db->trans_complete();
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
				$this->db->trans_start();
				$this->db->where(array("id_paciente"=>$this->id_paciente));
        		$this->db->update("paciente", $this->form_data);
        		$this->db->trans_complete();
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

		/**
		* Method save_meditation
		* Insert data patient meditation
		* @return array message
		*/
		function save_meditation(){
			$para = array("paciente_id_paciente"=>$this->meditions["paciente_id_paciente"], "fecha_inicio"=>$this->meditions["fecha_inicio"]);

			$query = $this->db->get_where("medicionpaciente",$para);
			$result = $query->result();

			if(count($result) > 0){
				return array("message"=>"La fecha de medición ya existe, por favor escoja otra fecha.");
			}
			
			try{
				$this->db->trans_start();
				$this->db->set('fecha_registro', 'NOW()', FALSE);
				$this->db->insert('medicionpaciente', $this->meditions);
				$this->db->trans_complete();
				return array("message"=>"ok");
			} catch (Exception  $e){
				return array("message"=>"error: $e");
			}
		}
	}
?>