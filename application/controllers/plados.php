<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plados extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('usuario', "", TRUE);
		$this->load->model('m_plados', "", TRUE);

		$this->load->library('session');
		session_start();
	}

	public function index()
	{
		$this->verifica_logeado();
		$this->load->view('eco/_head');
		$this->load->view('eco/_menu');
		$this->load->view('eco/_inicio');
		$this->load->view('eco/_footer');
		//$this->load->view('_login');
	}

	public function italiano()
	{
		$this->load->view('eco/_head');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/italiano');
		$this->load->view('eco/_footer');
	}


	function compras()
	{
		$datos['productos'] = $this->m_plados->obt_productos();

		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/compras', $datos);
		$this->load->view('eco/_footer');
	}

	function agregar_carrito()
	{
	
		$i = 0;


		$pedido = array(
						'articulo' 		=> $_POST['articulo'],
						'cantidad' 		=> $_POST['cantidad'],
						'precio'   		=> $_POST['precio'],
						'descripcion'	=> $_POST['descripcion'],
						'color'			=> $_POST['color'],
						'foto'			=> $_POST['foto']
						);

		if (isset($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key ) {
			$i++;
			}	
		}
		

		$_SESSION['cart'][$i] = $pedido;

		redirect('plados/compras');

		
	}

	function eliminar_carrito()
	{
		session_destroy();
		redirect('plados/compras');
	}

	function detalle_articulo()
	{
		$articulo = $this->uri->segment(3);
		$datos['producto'] = $this->m_plados->obt_articulo($articulo);

		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/producto', $datos);
		$this->load->view('eco/_footer');
	}

	function menu(){
		if($this->session->userdata("logged_in")){
			redirect("home");
		}
		else{
			redirect("ingreso");
		}
    }
	
	function carrito()
	{
		if (isset($_SESSION['cart'])) {
			$datos['carrito'] = $_SESSION['cart'];

		}
		else{
			$datos['carrito'] = NULL;
		}
		


		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/carrito', $datos);
		$this->load->view('eco/_footer');


	}

	function checkout()
	{
		if (isset($_SESSION['cart'])) {
			$datos['carrito'] = $_SESSION['cart'];

		}
		else{
			$datos['carrito'] = NULL;
		}

		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/checkout', $datos);
		$this->load->view('eco/_footer');

	}

	function login() {
		if(!isset($_POST["user"]) || !isset($_POST["password"]))
			redirect("/inicio/index");

		session_start();

		$_SESSION["user"]=$_POST["user"];
		$this->usuario->validar();
	}

	function logout()
	{
		$this->simplelogin->logout();
		redirect("acceso");
	}

	function verifica_logeado()
	{
		if($this->session->userdata("logged_in"))
			redirect("/Inicio");
	}

}
