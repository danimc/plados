<?
$cantProductos = 0;
$sub = 0; //die(var_dump($carrito)); 
$total = 0;
?>
<section class="mbr-section content3 mbr-section__container mbr-after-navbar" id="content3-37" data-rv-view="319" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-4">Resumen de Pedido</h3>
                <p class="mbr-section-subtitle lead">Confirma los articulos de tu pedido.</p>
            </div>
        </div>
    </div>    
</section>


	<div class="page-content ">
		<div class="row">
			<div class="ibox col-md-8">
    			<div class="ibox-body">
    			<? if($carrito != 0){?>
    				<div class="table">
    					<table class="table table-bordered">
    						<thead>
    							<th></th>
    							<th>CONCEPTO</th>
    							<th>COLOR</th>    							
    							<th>PRECIO UNITARIO</th>
    							<th>CANTIDAD</th>
    							<th>SUBTOTAL</th>
    						</thead>
    						<tbody>
    					<?    					
    					foreach ($carrito as $key) {
    						$subtotal = $key['cantidad'] * $key['precio'];
    						$cantProductos = $cantProductos + $key['cantidad'];
    						$sub = $sub + $subtotal; 
    						?>
    							<tr>
    								<td><img class="img-rounded" src="<?=base_url()?>src/img/<?=$key['foto']?>" alt="image" width="80px" />
    								<td><?=$key['descripcion']?>
    								<td><?=$key['color']?></td>
    								<td>$ <?=number_format($key['precio'],'2',',',' ')?></td>
    								<td align="center"><?=$key['cantidad']?></td>
    								<td>$ <?=number_format($subtotal,'2',',',' ')?>

    							<?}
    							$total = ($sub * 1.16);
    							?>
    						</tbody>

    						
    						<tr>

    					</table>
    				</div>
    				<?}?>
    			</div>
    		</div>

    		<div class="ibox col-md-4">
    			<div class="ibox-head">
    				<div class="ibox-title"> Resumen de cuenta</div>
    			</div>
    			<div class="ibox-body">
    				<table>
    					<tr>
    						<td>Cantidad de productos:</td>
    						<td align="center" width="50%"><b><?=$cantProductos?></b></td>
    					</tr>

    					<tr>
    						<td>Subtotal:</td>
    						<td align="center">$ <?=number_format($sub,'2',',',' ')?></td>
    					</tr>
    					<tr>
    						<td> I.V.A. </td>
    						<td align="center"> 16% </td>
    					</tr>
    					<tr>
    						<td>Total:</td>
    						<td align="center">$ <b><?=number_format($total,'2',',',' ')?></b></td>
    					</tr>
    				</table>
    				<div class="col-md-10" style="padding-top: 20px;">
    					<a href="<?=base_url()?>index.php/plados/datos_cliente" class="btn btn-sm btn-block btn-success"> CONTINUAR CON DATOS DE ENVIO </a>
    				</div>
    			</div>    			
    		</div>   	 
		</div>
    </div>




