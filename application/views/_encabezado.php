<?php
header("Content-Type: text/html;charset=utf-8");
$codigo = $this->session->userdata("id");  
$usuario = $this->m_usuario->obt_usuario($codigo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Plados admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 --> 
    <link href="<?=base_url()?>src/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="<?=base_url()?>src/assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/dataTables/datatables.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>src/assets/vendors/wysihtml5/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?=base_url()?>src/assets/css/main.min.css" rel="stylesheet" />

    <script src="<?=base_url()?>src/js/jquery-2.2.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>    

    <?php
    $controlador = $this->uri->segment(1);
    $funcion = $this->uri->segment(2);
    $objeto  = $this->uri->segment(3);

    $this->m_seguridad->log_general($controlador, $funcion, $objeto);
    
    if($this->session->userdata("id") == null){
        redirect('/acceso/logout');
    }
    if($this->m_seguridad->acceso_sistema() == 0)
    {

        redirect('/Inicio/noaccess');
    }
    ?>

<body class="has-animation fixed-layout fixed-navbar">
    <div class="page-wrapper">
        <header class="header">
            <div class="page-brand">
                <a href="<?=base_url()?>">
                    <span class="brand">PLADOS</span>
                    <span class="brand-mini"></span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </li>

                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    
                    

                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <span><?=$usuario->usuario?></span>                           
                                
                        </a>
                        <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                            <div class="dropdown-arrow"></div>
                            <div class="dropdown-header">
                                <div class="admin-avatar">
                                    
                                </div>
                                <div>
                                    <h5 class="font-strong text-white"><?=$usuario->nombre?></h5>
                                    <div>                    
                                        <span class="admin-badge"><i class="ti-lock mr-2"></i>PLADOS ADMIN</span>
                                    </div>
                                </div>
                            </div>
                            <div class="admin-menu-features">                            
                                <a class="admin-features-item" href="<?=base_url()?>index.php?/acceso/logout"><i class="ti-shift-right"></i>
                                    <span>CERRAR SESIÓN</span>
                                </a>
                            </div>
                        </div>
                    </li>
     
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
