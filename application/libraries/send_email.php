<?php 
	/**
	* Class send email
	*
	* @package Controllers
	* @author Juan Naranjo & Alejandro Castiblanco
	*/
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Class send_email
	*/
	class Send_email {
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

    		$config = Array(
		        'protocol'  => 'smtp',
		        'smtp_host' => 'ssl://smtp.gmail.com',
		        'smtp_port' => 465,
		        'smtp_user' => 'juan.n.elisalde@gmail.com',
		        'smtp_pass' => '123#Carmen',
		        'mailtype'  => 'html',
		        'charset'   => 'utf-8'
		    );

    		$this->CI->load->library('email', $config);
		    $this->CI->email->set_newline("\r\n");
        }

        /**
		* Method send 
		* @param \string to destiny
		* @param \string subject 
		* @param \string message
		*/
    	public function send($to, $subject, $message) {
		    $this->CI->email->from('juan.n.elisalde@gmail.com', 'Juan Naranjo');
		    $this->CI->email->to($to);
		    $this->CI->email->subject($subject);
		    $this->CI->email->message($message);
		    $response = $this->CI->email->send();
    	}
	}
?>