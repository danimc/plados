<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_seguridad',"",TRUE);
		$this->load->model('m_usuario',"",TRUE);
		$this->load->model('m_admin',"",TRUE);
		$this->load->model('m_correos',"",TRUE);
		$this->load->model('m_plados', "",TRUE);

		$ci = get_instance();	
		$this->ftp_ruta = $ci->config->item("f_ruta");
		$this->dir = $ci->config->item("oficios");

	}

	public function index()
	{
		

	}

	function editarDescripcion()
	{
		$texto 	= $this->input->post('texto');
		$id 			= $this->input->post('id');
		$this->m_admin->editar_descripcion($id, $texto);

		echo json_encode($texto);

	}

	function editarPrecio()
	{
		$precio = $this->input->post('precio');
		$id = $this->input->post('id');

		$this->m_admin->editar_precio($id, $precio);

		echo json_encode($precio);
	}

	function subir_fotos()
	{
		$id = $this->input->post('id');
		$modelo = $this->input->post('modelo');
		$idColor = $this->input->post('idColor');

		if($_FILES['fprincipal']['name'] != ""){
			$this->subir_foto($id, $modelo, $idColor);
		}
		echo "hecho";
	}



	function subir_adjuntos($idIncidente){

		for($i=0;$i<count($_FILES["imagen"]["name"]);$i++)
        {
        	if($_FILES['imagen']['name'][$i] != ""){

			
				$x = $i+1;
				$origen=$_FILES["imagen"]["tmp_name"][$i];
				$ext = explode('.',$_FILES['imagen']['name'][$i]);
				$ext = $ext[count($ext) - 1];
				$ruta ='att_' . $idIncidente .'_' . $x .'.' . $ext; 				
				move_uploaded_file($origen , $this->ftp_ruta . 'src/oficios/att/'. $ruta );

				$attach = array('id_ticket' 	=> $idIncidente,
								'tipo'			=> 3,
								'ruta'			=> $ruta,
								'ext'			=> $ext
								 );

				$this->m_ticket->subir_pdf($attach);
			}
		}

	}

	function subir_foto($id, $modelo, $idColor)
	{
			
		########## SCRIPT PARA SUBIR LA PORTADA ###########################
		if($_FILES['fprincipal']['name'] != ""){
			$this->load->library('image_lib');			
			$ext = explode('.',$_FILES['fprincipal']['name']);
			$ext = $ext[count($ext) - 1];
			$img = $modelo. "_" . $idColor;			
			move_uploaded_file($_FILES['fprincipal']['tmp_name'], $this->ftp_ruta . 'src/img/' . $img .'.' . $ext);	
			$config_image['image_library'] = 'gd2';
			$config_image['source_image'] = $this->ftp_ruta . 'src/oficios/in/doc_'. $img .'.'. $ext;
			$config_image['maintain_ratio'] = true;
			$config_image['quality'] = 98;
			$this->image_lib->initialize($config_image);
			$this->image_lib->resize(); 
			$portada = $img .'.' . $ext;
		######### FIN DEL SCRIPT#####################################	
			
			$this->m_admin->subir_portada($portada, $id);
		} 
	}

	function update_contactoUsr($ticket) 
	{
		$reportante = $ticket['usr_reportante'];
		$update = array(
				'extension' => $ticket['ext'],
				'correo'	=> $ticket['correo']
			);
		if ( $reportante != 0) {
			$this->m_usuario->editar_usuario($reportante, $update);
			}
	}

	function editar_producto()
	{
		$producto = $this->uri->segment(3);
		$datos['producto'] = $this->m_admin->obt_producto($producto);
		$this->load->view('_encabezado');
		$this->load->view('_menuLateral1');
		$this->load->view('v_editar_producto', $datos);
		$this->load->view('_footer1');

	}

	function lista_productos()
	{
		$datos['productos'] = $this->m_admin->lista_productos();
		$this->load->view('_encabezado');
		$this->load->view('_menuLateral1');
		$this->load->view('listas/l_productos', $datos);
		$this->load->view('_footer1');

				
	}

	function seguimiento()
	{
		$puesto = $this->session->userdata("puesto");
		$folio = $this->uri->segment(3);
		$rol = $this->session->userdata("rol");
		$datos['folio'] 		 = $folio;
		$datos['ticket'] 		 = $this->m_ticket->seguimiento_ticket($folio);
		$datos['asignados'] 	 = $this->m_ticket->obt_asignados($puesto);
		$datos['categorias'] 	 = $this->m_ticket->obt_categorias();
		$datos['seguimiento'] 	 = $this->m_ticket->obt_seguimiento($folio);		
		$datos['canal_atencion'] = $this->m_ticket->obt_canales();
		$datos['activos']		 = $this->m_ticket->obt_activos();

		switch ($datos['ticket']->tSolicitud) {
			case 2:
				$datos['oficio'] = $this->m_ticket->obtPdf($folio);
				break;
			case 3:
				$datos['attach'] = $this->m_ticket->obtAdjunto($folio);
				break;
			default:
				# code...
				break;
			}

		$this->load->view('_encabezado1');
		$this->load->view('_menuLateral1');
		$this->load->view('formularios/v_seguimiento_admin', $datos);
		$this->load->view('_footer1');
	}

	function asignar_usuario()
	{
		if ($_POST['antAsignado'] == $_POST['ingeniero']) {
			$msg = '<div class="alert alert-danger"><p><i class="fa fa-close"></i>El usuario seleccionado ya esta asignado e este ticket de servicio </p></div>';
		}else{

		if($_POST['antAsignado'] == '' or $_POST['antAsignado'] == '0'){
			$estatus = 2; 
		}else{
			$estatus = 7;
		}

		  $antCanal = $_POST['antCanal'];
		  $notificacion = 2;
		  $codigo = $this->session->userdata("codigo");	
		  $ingeniero = $_POST['ingeniero'];
		  $folio = $_POST['folio'];
		  $fecha= $this->m_ticket->fecha_actual();
		  $hora= $this->m_ticket->hora_actual();
		  $tg = $this->m_usuario->obt_telegramID($ingeniero);
		  $usr = $this->m_usuario->obt_usuario($ingeniero);
		  $canal = $usr->id_puesto;

		  $this->m_ticket->asignar_usuario($folio, $ingeniero, $fecha, $hora, $estatus, $canal);
		  $this->m_ticket->h_asignar_usuario($folio, $ingeniero, $fecha, $hora, $estatus, $canal);
		  if ($tg != null) {
		  	$this->m_ticket->sendTelegram_asignado($tg, $folio);
		  }		

	    $msg = '<div class="alert alert-success"><p><i class="fa fa-check"></i>Se ha Asignado con Exito</p></div>';
		}

		echo json_encode($msg);
	}

	function cambiar_categoria()
	{
		$categoria = $_POST['categoria'];
		$folio = $_POST['folio'];
		$antCategoria = $_POST['antCategoria'];
		$fecha= $this->m_ticket->fecha_actual();
		$hora= $this->m_ticket->hora_actual();

		$msg = new \stdClass();

		if ($categoria != $antCategoria) {
			$this->m_ticket->cambiar_categoria($folio, $categoria);
			$this->m_ticket->h_cambiar_categoria($folio, $categoria, $fecha, $hora);

			 $msg->id = 1;
			 $msg->mensaje = '<div class="alert alert-success"><p><i class="fa fa-check"></i> Se cambio la categoría</p></div>';
		}else{

			$msg->id = 2;
			$msg->mensaje = '<div class="alert alert-danger"><p><i class="fa fa-close"></i> Seleccionaste la categoría actual</p></div>';
			
		}

		echo json_encode($msg);
	}




	function insertarCat()
	{
		$titulo = $_POST['busqueda'];
		$categoria = $this->m_ticket->insertarCat_x_titulo($titulo);
		echo json_encode($categoria);
	}


	function mensaje()
	{
		$folio = $_POST['folio'];
		$mensaje = $_POST['chat'];
		$fecha= $this->m_ticket->fecha_actual();
		$hora= $this->m_ticket->hora_actual();
		$x = $this->m_ticket->obt_imagenesChat($folio);

		if($_FILES['imgComentario']['name'] != ""){			
			$ext = explode('.',$_FILES['imgComentario']['name']);
			$ext = $ext[count($ext) - 1];
			$x = $x+1;
			$pdf = 'c' . $folio . '_'. $x;			
			move_uploaded_file($_FILES['imgComentario']['tmp_name'], $this->ftp_ruta . 'src/oficios/att/' . $pdf .'.' . $ext);
			$nImg = $pdf .'.' . $ext;
			$this->resize($nImg);

		}else {
			$nImg = null;
		} 

		$this->m_ticket->mensaje($folio, $mensaje, $fecha, $hora, $nImg);
		//$this->m_ticket->sendTelegram_chat($folio, $mensaje);

		redirect(base_url() . 'index.php?/ticket/seguimiento/'.$folio);
	}


	function correo()
	{
		$config = array();

		
		$config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail" 
		$config['protocol'] = "mail"; //use 'mail' instead of 'sendmail or smtp' 
		$config['smtp_host'] = "smtp.gmail.com"; 
		$config['smtp_user'] = 'incidenciasoag@gmail.com'; 
		$config['smtp_pass'] = 'abogral90';
		$config['smtp_port'] = 465;
		$config['smtp_crypto'] = 'ssl';
		$config['smtp_timeout'] = "";
		$config['mailtype'] = "html";
		$config['charset'] = "utf-8";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		$config['validate'] = FALSE;


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

		echo $this->email->print_debugger();
	}
	function correo_ticket_levantado()
	{

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

		echo $this->email->print_debugger();
		

	}

	function resize($nImg)
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'src/oficios/att/'. $nImg;
		$config['new_image'] = 'src/oficios/att/'. $nImg;
		$config['maintain_ratio'] = TRUE;
		$config['create_thumb'] = FALSE;
		$config['width'] = 800;
		$config['height'] = 800;

		$this->image_lib->initialize($config);

if (!$this->image_lib->resize()) {
	echo $this->image_lib->display_errors('', '');
}
	}

	function mandar_telegram()
	{
		$this->m_ticket->SendTelegram1();
	}

	function bonndia()
	{
	

		$temp = file_get_contents("http://10.15.16.61:80/VehiculosRobados.asmx?op=ConsultaRobado");
		echo $temp;
		//$clima = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/forecast?id=8133378&APPID=731ac0d3caf3cd694ce7a8df5d1c278b&units=metric&lang=es"));
		
		//$clima = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?id=8133378&APPID=731ac0d3caf3cd694ce7a8df5d1c278b&units=metric&lang=es"));

        /*$clima = json_decode($respuesta);
        $datosClima = $clima->main;
        $datosGen   = $clima->weather;
        $temperatura = $datosClima->temp;*/
      //  $descripcion    = $datosGen->description;
        
      

		//$temp = $this->m_ticket->bonndia();
		//echo $temp;
	}

	
}