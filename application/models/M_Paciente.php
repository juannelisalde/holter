<?php
	/**
	* Clase modelo de paciente
	*
	* @package Models
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class paciente
	*/
	class M_Paciente extends CI_Model{
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
				"tipodocum_id_tipodocum"=>isset($tipodocum_id_tipodocum) ? $tipodocum_id_tipodocum : null,
				"documento"=>isset($documento) ? strtoupper($documento) : null,
				"nombres"=>isset($nombres) ? strtoupper($nombres) : null,
				"apellidos"=>isset($apellidos) ? strtoupper($apellidos) : null,
				"fecha_nacimiento"=>isset($fecha_nacimiento) ? $fecha_nacimiento : null,
				"genero"=>isset($genero) ? strtoupper($genero) : null,
				"telefono"=>isset($telefono) ? strtoupper($telefono) : null,
				"celular"=>isset($celular) ? $celular : null,
				"email"=>isset($email) ? $email : null,
				"direccion"=>isset($direccion) ? strtoupper($direccion) : null,
			);
		}

		/**
		* Metodo insert
		* Metodo que inserta los datos del paciente
		* @return array mensaje
		*/
		function insert(){
			$result = $this->consult();
			if(count($result) > 0){
				$this->form_data["id_paciente"] = $result[0]->id_paciente;
				return $this->modify();
			}

			try{
				$this->db->insert('paciente', $this->form_data);
				return array("message"=>"ok");
			} catch (Exception  $e){
				return array("message"=>"error");
			}
		}

		/**
		* Metodo modify
		* Metodo que modifica los datos del paciente cunado este ya exite
		* @return array mensaje
		*/
		public function modify(){
			extract($this->form_data);
			try{
				$this->db->where(array("id_paciente"=>$id_paciente));
        $this->db->update("paciente", $this->form_data);
				return array("message"=>"ok");
			} catch (Exception  $e){
				return(array("message"=>"error: $e"));
			}
		}

		/**
		* Metodo consult
		* Metodo que consulta de la base de datos los datos del paciente
		* @return array datos encontrados
		*/
		public function consult(){
			extract($this->form_data);
			$para["documento"] = strtoupper($documento);
			$query = $this->db->get_where("paciente",$para);
			return $query->result();
		}
	}
?>