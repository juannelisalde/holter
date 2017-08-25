<?php
	/**
	* Class functions globals
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class functions
	*/
	class Functions {
		/**
	    * Private object CI
	    * @var CI
	    */
    	private $CI;

    	/**
		* Method construct 
		* Initializes librarie email
		*/
    	public function __construct() {
    		$this->CI =& get_instance();
        }

        /**
		* method validate_fields
		* Validate fields of form data in controller
		* @param array fields to validate in form data
		* @param array form_data field to validate
		* @return array message
		*/
		public function validate_fields($fields, $form_data){
			foreach ($fields[0] as $key => $value) {
				if(!array_key_exists($value, $form_data) || !strlen(trim($form_data[$value]))){
					return array("message"=>"Debe Digitar El Campo " . $fields[1][$key]);
				}

				$response = $this->validate_type_field($form_data[$value], $fields[2][$key]);
				if($response != "ok"){
					return array("message"=>$response . " (" . $form_data[$value] . ") En El Campo $value - " . $fields[1][$key]);
				}
			}

			return array("message"=>"ok");
		}

		/**
		* Method validate_type_field
		* Validate type field
		* @param \string text to validate
		* @param \string type field
		* @return string message
		*/
		public function validate_type_field($text, $type){
			$type = strtoupper(trim($type));
			switch ($type) {
				case 'INTEGER':
					if(!is_numeric($text)){
						return "Debe Digitar Valor Numerico";
					}
				break;

				case 'EMAIL':
					if(strpos($text, "@") === false || strpos($text, ".") === false){
						return "Debe Digitar Correo Valido";
					}
				break;

				case 'OPERATION':
					if(strtoupper($text) != "SUMA" && strtoupper($text) != "RESTA" && strtoupper($text) != "DIVISION" && strtoupper($text) != "MULTIPLICAION" && strtoupper($text) != "NA"){
						return "Debe Digitar Operacion Valida";
					}
				break;

				case 'BOOLEAN':
					if($text != 0 && $text != 1 || !is_numeric($text)){
						return "Debe Digitar Valor Booleano";
					}
				break;

				case 'ARRAY':
					if(gettype($text) != "array"){
						$text = json_decode($text, true);
					}

					if(gettype($text) != "array"){ 
						return "Debe Digitar Detalle";
					}
				break;

				default:
					return "ok";
				break;
			}
			return "ok";
		}

		/**
		* Method that throw message
		* @param array message to show
		*/
		public function message_json($message){
			die(json_encode($message));
		}

		/**
		* Method validate_session
		* Validate if session is active
		*/
		public function validate_session(){
			if(!isset($this->CI->session->tipo_usuario)){  
				redirect("login"); 
			}
		}
	}
?>