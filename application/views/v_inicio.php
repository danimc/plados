
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->

          <!-- Main content -->
    <section class="page-content fade-in-up">
      <!--<div class="row mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body flexbox-b">
                            <div class="easypie mr-4" data-percent="100" data-bar-color="#a4daff" data-size="80" data-line-width="8">
                                <span class="easypie-data text-blue" style="font-size:32px;"><i class="la la-ticket"></i></span>
                            </div>
                            <div>
                                <h3 class="font-strong text-blue"><?=$total?></h3>
                                <div class="text-muted">INCIDENTES REPORTADOS</div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body flexbox-b">
                            <div class="easypie mr-4" data-percent="<?=$pieResuletos?>" data-bar-color="#006815" data-size="80" data-line-width="8">
                                <span class="easypie-data text-success" style="font-size:32px;"><i class="la la-check"></i></span>
                            </div>
                            <div>
                                <h3 class="font-strong text-success"><?=$cerrados?></h3>
                                <div class="text-muted">INCIDENTES RESUELTOS</div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body flexbox-b">
                            <div class="easypie mr-4" data-percent="<?=$pieAbiertos?>" data-bar-color="#ff4081" data-size="80" data-line-width="8">
                                <span class="easypie-data text-pink" style="font-size:32px;"><i class="la la-tags"></i></span>
                            </div>
                            <div>
                                <h3 class="font-strong text-pink"><?=$abiertos?></h3>
                                <div class="text-muted">INCIDENTES PENDIENTES</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body flexbox-b">
                            <div class="easypie mr-4" data-percent="<?=$pieNoasig?>" data-bar-color="#f39c12" data-size="80" data-line-width="8">
                                <span class="easypie-data text-warning" style="font-size:32px;"><i class="la la-info"></i></span>
                            </div>
                            <div>
                                <h3 class="font-strong text-warning"><?=$noasig?></h3>
                                <div class="text-muted">INCIDENTES SIN ASIGNAR</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>-->

    <div class="row"> 
        <div class="col-lg-4 col-md-4 mb-4">
            <a href="<?=base_url()?>index.php?/admin/lista_productos">
            <div class="card bg-info">
                <div class="card-body">
                    <h2 class="text-white"> Lista de Productos <i class="ti-ticket float-right"></i></h2>
                    <div class="text-white mt-1"><i class="ti-stats-up mr-1"></i><small>Lista de productos</small></div>
                </div>
                <div class="progress mb-2 widget-dark-progress">
                    <div class="progress-bar" role="progressbar" style="width:100%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            </a>
        </div>
    </div>
    </section>

            


