



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
	<div class="page-content fade-in-up">
		<div class="row">
            <?
           //die(var_dump($productos));
			$tmpProducto = '';
			foreach ($productos as $p) {
				//$color = $this->m_plados->color($producto->idColor);
                //if ($tmpProducto != $producto->modelo){ //codigo para juntar los productos con el mismo codigo ?>
                
				<div class="d-flex flex-wrap mb-5">
                    <div class="card mb-4 mr-4" style="width:346px;">
                        <div class="rel">
                            <img class="card-img-top" height="200px" src="<?=$p['imagen']?>" alt="image" />
                            <div class="card-img-overlay text-white">
                                <div class="text-right">
                                </div>
                                <div class="overlay-panel overlay-panel-bottom color-white mb-2">
                                    <h4 class="card-title mb-2">
                                        <a></a>
                                    </h4>
                                    <div> </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex">
                            <div>
                                <div>
                                    <span class="text-primary pb-1 d-inline-block" style="border-bottom:2px solid;">Acerca de</span>
                                </div>
                                <p class="text-light mt-3"><?=$p['clave']?> <?=$p['marca']?> MODELO <?=$p['descripcion']?></p>
                                <p style="color: #00a994"> <b>$<?=$p['precio']?> </b></p>

                                <div>
                                <a href="<?=base_url()?>index.php/plados/detalle_articulo/">	
                                    <button class="btn btn-danger col-xs-6 btn-sm btn-animated from-top">
                                    	<span class="visible-content"><i class="ti-shopping-cart font-16 v-middle"></i></span>
                                    	<span class="hidden-content">Comprar</span>
                                	</button>
                            	</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?// }
			//$tmpProducto = $producto->modelo;
			}
			?>
    	 
		</div>
    </div>
</div>



