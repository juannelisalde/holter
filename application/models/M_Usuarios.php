<?php
	/**
	* Class users model
	*
	* @package Models
	* @author Juan Naranjo & Alejandro Castiblanco
	*/

	/**
	* Class users
	*/
	class M_Usuarios extends CI_Model{
		/**
	    * Private array form data
	    * @var form_data
	    */
		private $form_data;

		/**
	    * Private integer user id
	    * @var id_usuario
	    */
		private $id_usuario;

		/**
	    * Private string user email
	    * @var email
	    */
		private $email;

		/**
	    * Private string user password
	    * @var pass
	    */
		private $pass;

		/**
		* Method constuct
		* Initialises attributes of the class
		* @param array form data
		*/
		function construct(array $form_data){
			extract($form_data);
			$this->form_data = array(
				"nombres" => isset($nombres) ? strtoupper($nombres) : null,
				"apellidos" => isset($apellidos) ? strtoupper($apellidos) : null,
				"email" => isset($email) ? $email : null,
				"pass" => isset($pass) ? sha1($pass) : null,
				"tipo_usuario" => isset($tipo_usuario) ? $tipo_usuario : null,
			);

			$this->id_usuario = isset($id_usuario) ? $id_usuario : null;
			$this->email = isset($email) ? $email : null;
			$this->pass = isset($pass) ? sha1($pass) : null;
		}

		/**
		* Method insert
		* Insert data users
		* @return array message
		*/
		function insert(){
			$result = $this->consult();
			if(count($result) > 0){
				$this->form_data["id_usuario"] = $result[0]->id_usuario;
				$this->id_usuario = $result[0]->id_usuario;
				return $this->update();
			}

			try{
				$this->db->trans_start();
				$this->db->set('creacion_usuario', 'NOW()', FALSE);
				$this->db->insert('usuarios', $this->form_data);
				$this->db->trans_complete();
				return array("message"=>"ok");
			} catch (Exception  $e){
				return array("message"=>"error");
			}
		}

		/**
		* Method update
		* Update user data
		* @return array mensaje
		*/
		public function update(){
			try{
				$this->db->trans_start();
				$this->db->set('modificacion_usuario', 'NOW()', FALSE);
				$this->db->where(array("id_usuario"=>$this->id_usuario));
		    $this->db->update("usuarios", $this->form_data);
		    $this->db->trans_complete();
				return array("message"=>"ok");
			} catch (Exception  $e){
				return(array("message"=>"error: $e"));
			}
		}

		/**
		* Method consult
		* Get existing users
		* @return array users found
		*/
		public function consult(){
			$para = array("1"=>1);
			if($this->email != null){
				$para["email"] = $this->email;
			}
			if($this->pass != null){
				$para["pass"] = $this->pass;
			}
			
			$query = $this->db->get_where("usuarios",$para);
			return $query->result();
		}
		
		/**
		* Method insert_token
		* Insert token by user recover pass
		* @return array message
		*/
		public function insert_token(){
			try{
				$this->db->trans_start();
				$this->db->set('estado_token', 'VEN');
				$this->db->where("TIMESTAMPDIFF(HOUR, NOW(), fecha_creacion) * -1 >= 24");
		    $this->db->update("recuperarpass");
		    $this->db->trans_complete();
			} catch (Exception  $e){
				return(array("message"=>"error: $e"));
			}

			$response = $this->get_token();
			if(count($response) > 0){
				return array("message"=>"ok", "token"=>$response[0]->token);
			}

			try{
				$this->db->trans_start();
				$hash = sha1($this->id_usuario . " " .date("d-m-Y H:i:s"));
				$this->db->set('token', sha1($hash));
				$this->db->set('id_usuario', $this->id_usuario);
				$this->db->set('estado_token', 'ACT');
				$this->db->set('fecha_creacion', 'NOW()', FALSE);
				$this->db->insert('recuperarpass');
				$this->db->trans_complete();
				return array("message"=>"ok", "token"=>$hash);
			} catch (Exception  $e){
				return array("message"=>"error");
			}
		}

		/**
		* Method get_token
		* Get token active
		* @return array message
		*/
		public function get_token(){
			$query = $this->db->get_where("recuperarpass",array("id_usuario"=>$this->id_usuario, "estado_token"=>"ACT"));
			return $query->result();
		}

		/**
		* Method recover_pass
		* Set pass user
		* @return array message
		*/
		public function recover_pass(){
			$this->db->select('token');    
			$this->db->from('usuarios');
			$this->db->join('recuperarpass', 'usuarios.id_usuario = recuperarpass.id_usuario');
			$this->db->where("estado_token", "ACT");
			$query = $this->db->get();
			$result = $query->result();
			if(count($result) == 0){
				return array("message"=>"Usuario No Tiene Token Activo");
			}

			try{
				$this->db->trans_start();
				$this->db->set('estado_token', 'INA');
				$this->db->where('token', $result[0]->token);
				$this->db->update('recuperarpass');
				$this->db->trans_complete();
			} catch (Exception  $e){
				return(array("message"=>"error: $e"));
			}

			try{
				$this->db->trans_start();
				$this->db->set('modificacion_usuario', 'NOW()', FALSE);
				$this->db->set(array("pass"=>$this->pass));
				$this->db->where('email', $this->email);
				$this->db->update('usuarios');
				$this->db->trans_complete();
				return array("message"=>"ok");
			} catch (Exception  $e){
				return(array("message"=>"error: $e"));
			}
		}

	}
?>