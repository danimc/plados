<?
$codigo = $this->session->userdata("id");   
$usuario = $this->m_usuario->obt_usuario($codigo);
?>

        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">

                <ul class="side-menu metismenu">
                    <li class="heading">MENÚ LATERAL</li>
                    <li class="active">
                        <a href="<?php echo base_url();?>index.php?/Inicio"><i class="sidebar-item-icon ti-home"></i>
                            <span class="nav-label">Inicio</span></a>
                    </li>                    
                    <li>
                        <a href="<?=base_url()?>index.php?/ticket/nuevo_ticket"><i class="sidebar-item-icon ti-ticket"></i>
                            <span class="nav-label">Nuevo Ticket</span></a>
                    </li>                    
       
                </ul>
                <div class="sidebar-footer">
<!--                     <a href="javascript:;"><i class="ti-announcement"></i></a>
                    <a href="calendar.html"><i class="ti-calendar"></i></a>
                    <a href="javascript:;"><i class="ti-comments"></i></a> -->
                    <a href="<?=base_url()?>index.php?/acceso/logout" title="Cerrar Sesion"><i class="ti-power-off"></i></a>
                </div>
            </div>
        </nav>