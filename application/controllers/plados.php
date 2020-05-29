<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plados extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('usuario', "", TRUE);
		$this->load->model('m_plados', "", TRUE);
		$this->load->model('m_admin', "", TRUE);

		$this->load->library('session');
		session_start();
	}

	public function index()
	{
		//$this->verifica_logeado();
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
			foreach ($_SESSION['cart'] as $key) {
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
		$datos['galeria']  = $this->m_admin->obt_galeria($articulo);
		$datos['producto'] = $this->m_plados->obt_articulo($articulo);

		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/producto', $datos);
		$this->load->view('eco/_footer');
	}

	function pagar()
	{
		$this->load->library('Stripe');
	}

	function menu()
	{
		if ($this->session->userdata("logged_in")) {
			redirect("home");
		} else {
			redirect("ingreso");
		}
	}

	function carrito()
	{
		if (isset($_SESSION['cart'])) {
			$datos['carrito'] = $_SESSION['cart'];
		} else {
			$datos['carrito'] = NULL;
		}



		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/carrito', $datos);
		$this->load->view('eco/_footer');
	}

	function datos_cliente()
	{
		$_SESSION['idCliente'] = 3; ###############SOLO PARA PRUEBAS!!!! BORRAARR
		if (isset($_SESSION['idCliente'])) {
			redirect('plados/checkout');
		}
		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/datos');
		$this->load->view('eco/_footer');
	}

	function guardar_datos()
	{
		$cliente = array(
			'nombre' 		=> $this->input->post('nombre'),
			'aPaterno'		=> $this->input->post('aPaterno'),
			'aMaterno'		=> $this->input->post('aMaterno'),
			'correo'		=> $this->input->post('correo'),
			'celular'		=> $this->input->post('celular'),
			'telefono'		=> $this->input->post('telefono')
		);

		$this->m_plados->guardar_cliente($cliente);
		$idCliente = $this->db->insert_id();

		$direccion = array(
			'cliente'		=> $idCliente,
			'calle' 		=> $this->input->post('Calle'),
			'numExterno'	=> $this->input->post('NumExterno'),
			'numInterno' 	=> $this->input->post('NumInterno'),
			'edificio'		=> $this->input->post('edificio'),
			'estado'		=> $this->input->post('estado'),
			'cp'			=> $this->input->post('cp'),
			'ciudad'		=> $this->input->post('ciudad'),
			'colonia'		=> $this->input->post('colonia'),
			'referencias'	=> $this->input->post('referencias')
		);
		$this->m_plados->guardar_direccion($direccion);

		$_SESSION['idCliente'] = $idCliente;

		redirect('plados/checkout');
	}


	function checkout()
	{


		$usuario = $this->m_plados->obt_cliente($_SESSION['idCliente']);
		$datos['usuario'] = $usuario;
		require_once('application/libraries/stripe-php/init.php');
		$carrito = '';
		$sub = 0;
		$cantProductos = 0;
		$p = '';


		if (isset($_SESSION['cart'])) {
			$datos['carrito'] = $_SESSION['cart'];
			$carrito = $_SESSION['cart'];
		} else {
			$datos['carrito'] = NULL;
			redirect('plados/carrito');
		}

		foreach ($carrito as $c) {
			$subtotal = $c['cantidad'] * $c['precio'];
			$cantProductos = $cantProductos + $c['cantidad'];
			$sub = $sub + $subtotal;

			$p = $p . $c['descripcion'] . ' ';
		}

		$total = round(number_format($sub * 1.16, 2, '.', ''));



		\Stripe\Stripe::setApiKey('sk_test_cNEnkPQ796OFqgwfXH2oBUyq00qKunHgZw');

		$session = \Stripe\Checkout\Session::create([
			'payment_method_types' => ['card'],
			'line_items' => [[
				'name' => 'PEDIDO EN PLADOS MX',
				//'description' => 'Comfortable cotton t-shirt',
				//'images' => ['http://plados.koberdesarrollo.com/src/img/'.$carrito[0]['foto']],
				'amount' => $total * 100,
				'currency' => 'mxn',
				'quantity' => 1,
			]],
			'success_url' => base_url() . 'index.php/plados/success?session_id={CHECKOUT_SESSION_ID}',
			'cancel_url' => base_url() . 'index.php/plados/checkout',
		]);

		$stripeSession = array($session);
		$sessId = ($stripeSession[0]['id']);
		$datos['sesion'] = $sessId;



		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/checkout', $datos);
		$this->load->view('eco/_footer');
	}

	function success()
	{
		require_once('application/libraries/stripe-php/init.php');
		\Stripe\Stripe::setApiKey('sk_test_cNEnkPQ796OFqgwfXH2oBUyq00qKunHgZw');

		$usuario = $_GET['session_id'];
		$carrito = $_SESSION['cart'];
		$sub = 0;
		$cantProductos = 0;
		$idPago = '';

		if ($this->m_plados->comprobar_pedido($usuario) == 0) {
			$events = \Stripe\Event::all([
				'type' => 'checkout.session.completed',
				'created' => [
					// Check for events created in the last 24 hours.
					'gte' => time() - 24 * 60 * 60,
				],
			]);
			foreach ($events->autoPagingIterator() as $event) {
				$session = $event->data->object;

				if ($session['id'] == $usuario) {
					$idPago = $session['payment_intent'];
					$cuenta = $session['display_items'][0]['amount'];
				}
			}

			foreach ($carrito as $c) {
				$subtotal = $c['cantidad'] * $c['precio'];
				$cantProductos = $cantProductos + $c['cantidad'];
				$sub = $sub + $subtotal;
			}
			$total = round(number_format($sub * 1.16, 2, '.', ''));

			//echo json_encode($carrito);

			if ($total * 100 == $cuenta) {
				$pedido = array(
					'cliente' 		=> $_SESSION['idCliente'],
					'sesCompra'		=> $usuario,
					'idPago'		=> $idPago,
					'cantArticulos'	=> $cantProductos,
					'cuenta'		=> $cuenta
				);

				$this->m_plados->guardar_pedido($pedido);
				$idPedido = $this->db->insert_id();


				$x = 0;
				foreach ($carrito as $c) {
					$carrito[$x]['pedido'] = $idPedido;
					$this->m_plados->articulo_pedido($carrito[$x]);
					$x++;
				}
			}

			$_SESSION['cart'] = NULL;
			redirect('plados/exito/' . $idPedido);
		}
		else {
			echo "ERROR, ESTE PEDIDO YA ESTA REGISTRADO";
			$this->checkout();
		}
	}

	function exito()
	{

		$pedido = $this->uri->segment(3);
		$datos['pedido'] = $this->m_plados->obt_pedido($pedido);
		
		$this->load->view('_encabezado1');
		//$this->load->view('_menuLateral1');
		$this->load->view('eco/_menu');
		$this->load->view('eco/pages/exito', $datos);
		$this->load->view('eco/_footer');
	}

	function login()
	{
		if (!isset($_POST["user"]) || !isset($_POST["password"]))
			redirect("/inicio/index");

		session_start();

		$_SESSION["user"] = $_POST["user"];
		$this->usuario->validar();
	}

	function logout()
	{
		$this->simplelogin->logout();
		redirect("acceso");
	}

	function verifica_logeado()
	{
		if ($this->session->userdata("logged_in"))
			redirect("/Inicio");
	}
}
