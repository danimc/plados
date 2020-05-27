
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
 <div class="page-heading">
                <h1 class="page-title">Lista de Productos</h1>
                <br>
    <a href="<?=base_url()?>" class="btn btn-blue btn-icon-only btn-lg"><i class="fa fa-arrow-left"></i></a>
    <a href="<?=base_url()?>index.php?/ticket/nuevo_ticket" class="btn btn-warning btn-icon-only btn-lg "><span class="fa fa-plus"></span></a>
    </div>
  <!-- Main content -->
  <section class="page-content fade-in-up">

    <div class="ibox">
                    <div class="ibox-body">
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                               
                                <div class="btn-group bootstrap-select show-tick form-control" style="width: 150px;"></div>
                            </div>
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Buscar ...">
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                              <table class="table table-bordered table-hover dataTable no-footer dtr-inline" id="datatable" role="grid" aria-describedby="datatable_info" >
                                <thead class="thead-default thead-lg">
                                  <tr role="row">
                                    <th>Presentación</th>
                                    <th>#id</th>
                                    <th>
                                      Categoria
                                    </th>
                                    <th>
                                      Marca
                                    </th>                                    
                                    <th>
                                       Modelo
                                    </th>
                                    <th>
                                       Color
                                    </th>
                                    <th>
                                      Precio</th>
                                    <th>
                                      Editar
                                    </th>

                        
                                  </tr>
                                </thead>

                                <tbody>
                                  <? foreach ($productos as $p) 
                                   {
                                  ?>                                    
                                    <tr width="10px" align="center" class="">
                                      <td><img src="<?=base_url()?>src/img/<?=$p->foto?>" width="100px" alt="Foto Principal"></td>
                                      <td><?=$p->id_catProducto?></td>
                                      <td><?=$p->producto?></td>
                                      <td><?=$p->linea?></td>
                                      <td><?=$p->modelo?></td>
                                      <td><?=$p->color?></td>
                                      <td>$ <?=number_format($p->precio,'2',',',' ')?></td>
                                      <td> <a href="<?=base_url()?>index.php?/admin/editar_producto/<?=$p->id_catProducto?>">
                                        <i class="fa fa-pencil"></i> </a> </td>
                                    </tr>
                                
                                  <?
                                    }
                                  ?>
                                    </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                       </div></div>
                        </div>
                    </div>
                </div>

  </section>


 <script>
        $(function() {
            $('#datatable').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false
                }] 
            });
            var table = $('#datatable').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(2).search($(this).val()).draw();
            });
        });
    </script>

