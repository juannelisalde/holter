<?php
	/**
	* Clase modelo de usuario
	*
	* @package Models
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class usuario
	*/
	class M_Usuarios extends CI_Model{
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
				"nombres"=>isset($nombres) ? strtoupper($nombres) : null,
				"apellidos"=>isset($apellidos) ? strtoupper($apellidos) : null,
				"email"=>isset($email) ? $email : null,
				"pass"=>isset($pass) ? sha1($pass) : null,
				"tipo_usuario"=>isset($tipo_usuario) ? $tipo_usuario : null,
			);
		}

		/**
		* Metodo insert
		* Metodo que inserta los datos del usuario
		* @return array mensaje
		*/
		function insert(){
			$result = $this->consult();
			if(count($result) > 0){
				$this->form_data["id_usuario"] = $result[0]->id_usuario;
				return $this->modify();
			}

			extract($this->form_data);

			try{
				$this->db->set('creacion_usuario', 'NOW()', FALSE);
				$this->db->insert('usuarios', $this->form_data);
				return array("message"=>"ok");
			} catch (Exception  $e){
				return array("message"=>"error");
			}
		}

		/**
		* Metodo modify
		* Metodo que modifica los datos del usuario cunado este ya exite
		* @return array mensaje
		*/
		public function modify(){
			die("hola");
			extract($this->form_data);
			try{
				$this->db->where(array("id_usuario"=>$id_usuario));
				$this->db->set('modificacion_usuario', 'NOW()', FALSE);
		        $this->db->update("usuarios", $this->form_data);
				return array("message"=>"ok");
			} catch (Exception  $e){
				return(array("message"=>"error: $e"));
			}
		}

		/**
		* Metodo consult
		* Metodo que consulta de la base de datos los datos del usuario
		* @return array datos encontrados
		*/
		public function consult(){
			extract($this->form_data);
			$para["email"] = $email;
			$query = $this->db->get_where("usuarios",$para);
			return $query->result();
		}
	}
?>