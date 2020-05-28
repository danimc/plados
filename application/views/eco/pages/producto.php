<?
    $color = $this->m_plados->color($producto->idColor);
    $carrusel = sizeof($galeria);
?>



<section class="mbr-section content3 mbr-section__container mbr-after-navbar" id="content3-37" data-rv-view="319" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-4">SALA DE COMPRAS</h3>
                <p class="mbr-section-subtitle lead">Compra desde la comodidad de tu hogar.</p>
            </div>
        </div>
    </div>    
</section>
<div class="content-wrapper">
	<div class="page-content">
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
            <div  class="col-md-5">
                <div class="ibox">
                    <div class="ibox-body">
                    	<h3><b><?=$producto->producto?> <?=$producto->linea?> MODELO <?=$producto->modelo?></b></h3>
                    	<p>COLOR: <?=$producto->color?> <?=$color?></p>
                    	<h4 style="color: #00a994 "><b> $<?=number_format($producto->precio,'2',',',' ')?> </b></h4>
                    	<span style="color: #7f7f7f; font-style: italic; ">Precios antes de IVA</span>

                    	<div class="form-grouop" style="padding-top: 50px">
                    		<form id="carrito" action="<?=base_url()?>index.php/plados/agregar_carrito" method="POST">
                    		<label>Cantidad:</label>
                    		<select name="cantidad" class="form-control-sm" >
                    			<?for($i=1; $i<10; $i++) {?>
										<option><?=$i?></option>
                    			<?}?>
                    			
                    		</select>
                    		<input type="hidden" name="precio" value="<?=$producto->precio?>">
                    		<input type="hidden" name="articulo" value="<?=$producto->id_catProducto?>">
                    		<input type="hidden" name="descripcion" value="<?=$producto->producto?> <?=$producto->linea?> MODELO <?=$producto->modelo?>">
                    		<input type="hidden" name="color" value="<?=$producto->color?>">
                    		<input type="hidden" name="foto" value="<?=$producto->foto?>">

                    		<br><br><br><br>
                    		<button class="btn btn-info btn-fix btn-animated from-left">
                                    <span class="visible-content"><i class="fa fa-shopping-cart"></i></span>
                                    <span class="hidden-content">
                                        <span class="btn-icon">Comprar</span>
                                    </span>
                                </button>

                    		</form>
                    	</div>
                    	
                    </div>
    			</div>
    		</div>
            
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">
                            Descripción
                        </div>
                    </div>
                    <div class="ibox-body">
                        <?=$producto->descripcion?>
                    </div>
                </div>    	 

            </div>
		</div>
    </div>
</div>



