<?
    $color = $this->m_plados->color($producto->idColor);
    $carrusel = sizeof($galeria);
?>

<div class="content-wrapper">
	<div class="page-content fade-in-up">
		<div class="row">
            <div class="col-md-7">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="card mb-4">
                            <div class="carousel slide" id="carousel_1" data-ride="carousel">
                                <ol class="carousel-indicators" style="top:1.25rem;bottom:auto;">
                                    <li class="active" data-target="#carousel_1" data-slide-to="0"></li>
                                    <? for($i = 1; $i <= $carrusel; $i++)
                                        {?>
                                             <li data-target="#carousel_<?=$i?>" data-slide-to="<?=$i?>"></li>
                                        <?}?>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="card-img" src="<?=base_url()?>src/img/<?=$producto->foto?>" alt="image" />
                                    </div>
                                    <? foreach($galeria as $g) 
                                    {?>
                                        <div class="carousel-item">
                                            <img class="card-img" src="<?=base_url()?>src/img/productos/<?=$g->ruta?>" alt="image" />
                                        </div>
                                    <?}?>
                                    <!--  
                                        <div class="carousel-item">
                                            <img class="card-img" src="assets/img/blog/15.jpg" alt="image" />
                                        </div>-->
                                </div>
                            </div>
                            <div class="card-img-overlay">
                                <div class="overlay-panel overlay-panel-bottom overlay-panel-dark flexbox">
                                    <div class="d-inline-flex align-items-center">
                                        <a>
                                        </a>
                                    <div>
                                        <h5 class="m-0">
                                            <a>Línea: <?=$producto->linea?> </a>
                                            </h5><small>Modelo: <?=$producto->modelo?></small></div>
                                    </div>
                                    <div class="d-inline-flex">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="ibox">
                <div class="ibox-body">                   
                    	<h3><b><?=$producto->producto?> <?=$producto->linea?> MODELO <?=$producto->modelo?></b></h3>
                    	<p>COLOR: <?=$producto->color?> <?=$color?></p>
                        <h4 id="txtPrecio" style="color: #00a994 "><b> $<span id="cantidad"> <?=number_format($producto->precio,'2',',',' ')?> </span> </b>
                            <a><span onclick="editar_cantidad();" class="badge badge-default"><i class="fa fa-pencil"></i> </span> </a>
                        </h4>
                        <div class="row" id="editaPrecio">
                            <input type="number" id="precio" name="precio" class="form-control col-md-6" value="<?=$producto->precio?>">
                            <button class="btn btn-success" onclick="guardaPrecio();"><i class="fa fa-check"></i> </button> 
                            <button class="btn btn-danger " onclick="cancelarPrecio();"><i class="fa fa-close"></i> </button>
                        </div>
                        
                    	<span style="color: #7f7f7f; font-style: italic; ">Precios antes de IVA</span>

                        <div class="form-grouop" style="padding-top: 50px">
                            <form enctype="multipart/form-data" role="form" method="POST" action="<?=base_url()?>index.php?/admin/subir_fotos">
                                <div class="form-group mb-12 col-md-12 " >
                                    <label class="col-sm-12 col-form-label"><b>Imagen Principal:</b> </label>
                                    <div class="col-sm-12">
                                        <input type="hidden" name="id" value="<?=$producto->id_catProducto?>">
                                        <input type="hidden" name="modelo" value="<?=$producto->modelo?>">
                                        <input type="hidden" name="idColor" value="<?=$producto->idColor?>">
                                        
                                        <input type="file" id="fprincipal" name="fprincipal">
                                    </div>                                    
                                </div>
                                <hr>
                                <div class="form-group mb-12 col-md-12 " >
                                    <label class="col-sm-12 col-form-label"><b>Galeria / Carrusel:</b> </label>
                                    <div class="col-sm-12">
                                        <input type="hidden" name="id" value="<?=$producto->id_catProducto?>">
                                        <input type="file" id="galeria" name="galeria[]"  multiple="multiple">
                                    </div>                                    
                                </div>
                                <br>
                                <br>
                                <input type="submit" class="btn btn-success btn-block" value="Subir Fotos">
                            </form>          	
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">                            
    		<div class="ibox">
    			<div class="ibox-head">
    				<div class="ibox-title">
    					Descripción
    				</div>
                </div>
                <div class="ibox-body"><span id="descrip"><?=$producto->descripcion?></span></div>
    			<div class="ibox-footer">
                    <textarea required="true" id="summernote" placeholder="Escriba aquí todos los detalles del incidente" name="descripcion" data-plugin="summernote" data-air-mode="true"><?=$producto->descripcion?></textarea>
                    <br>
                    <button id="description" onclick="guardarDescripcion();" name="description" class="btn btn-rounded btn-success"><i class="fa fa-save"></i> Guardar Descripción</button>
                </div>    	 
        </div>
        </div>
    </div>
</div>


<script>
        $(function() {

            $("#editaPrecio").hide('fast');

            $('#summernote').summernote({
              toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            height: 100
            });
        });

        function guardarDescripcion() {
            texto = $("#summernote").val();
            id = <?=$producto->id_catProducto?>;

            data = { id, texto };
            
            $.ajax({
            type: "POST",
            dataType: 'json',
            url: '<?=base_url()?>index.php/admin/editarDescripcion',
            data,
            }).done(function(respuesta){
                $("#descrip").html(respuesta);
            })
        }

        function editar_cantidad()
        {
            $("#editaPrecio").show('fast');
            $("#txtPrecio").hide('fast');
        }

        function guardaPrecio()
        {
            precio = $("#precio").val();

            if(precio != <?=$producto->precio?>){
                id = <?=$producto->id_catProducto?>;
                data = { id, precio };
                $.ajax({
                type: "POST",
                dataType: 'json',
                url: '<?=base_url()?>index.php/admin/editarPrecio',
                data,
                }).done(function(respuesta){
                    $("#cantidad").html(respuesta);
                    cancelarPrecio();
                });                
            }else {
               cancelarPrecio();
            }
        }

        function cancelarPrecio()
        {
            $("#editaPrecio").hide('fast');
            $("#txtPrecio").show('fast');
        }
    </script>



