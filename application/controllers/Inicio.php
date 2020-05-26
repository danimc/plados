<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_seguridad',"",TRUE);
		$this->load->model('m_usuario',"",TRUE);
		$this->load->model('m_inicio',"",TRUE);
		$this->load->model('m_admin',"",TRUE);

	
	}

	public function index()
	{
		

		$this->load->view('_encabezado');
		$this->load->view('_menuLateral1');
		$this->load->view('v_inicio');
		$this->load->view('_footer1');	
	}

	function info() 
	{
		phpinfo();
	}

		function correo()
	{
	
$to      = 'daniel_k310a@hotmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
/*
		$this->load->library('email');
		$this->email->from('daniel_k310a@hotmail.com', 'FE');
		$this->email->to('daniel_k310a@hotmail.com');
		//$this->email->cc('incidenciasoag@gmail.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Registro de Incidente | incidenciasOAG');
		$this->email->message("prueba");
		$this->email->set_mailtype('html');
		$this->email->send();

		//redirect('ticket/seguimiento/'. $incidente);

		echo $this->email->print_debugger();*/
	}

	public function noaccess()
	{
		$this->load->view('_head');
		$this->load->view('errors/_noaccess');
	}

}
