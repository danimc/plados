<?
$cantProductos = 0;

$sub = 0; //die(var_dump($carrito)); 
$total = round(number_format($pedido->cuenta, 2, '.', ''));;
?>
<section class="mbr-section content3 mbr-section__container mbr-after-navbar" id="content3-37" data-rv-view="319" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-4">Felicidades!</h3>
                <p class="mbr-section-subtitle lead">Su pedido fue procesado satisfactoriamente</p>
            </div>
        </div>
    </div>
</section>

<div class="page-content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Datos del Pedido</div>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="6" style="background-color: #d6d6d6;">Datos del cliente</th>
                            </tr>
                            <tr>
                                <th> Cliente: </th>
                                <td> <?= $pedido->aPaterno ?> <?= $pedido->aMaterno ?> <?= $pedido->nombre ?> </td>
                                <th> Teléfono Personal: </th>
                                <td><?= $pedido->celular ?></td>
                                <th> Teléfono Particular: </th>
                                <td><?= $pedido->telefono ?></td>
                            </tr>
                            <tr>
                                <th> Correo Electrónico: </th>
                                <td colspan="5"> <?= $pedido->correo ?> </td>
                            </tr>
                            <tr>
                                <th> Dirección: </th>
                                <td> <?= $pedido->calle ?> #<?= $pedido->numInterno ?> <? if (isset($pedido->numInterno)) { ?> Int. <?= $pedido->numInterno ?> <? } ?>
                                    <? if (isset($pedido->edificio)) { ?> Edificio <?= $pedido->edificio ?> <? } ?> </td>
                                <th>Colonia:</th>
                                <td> <?= $pedido->colonia ?> </td>
                                <th>Ciudad:</th>
                                <td> <?= $pedido->ciudad ?> </td>
                            </tr>
                            <tr>
                                <th> Estado: </th>
                                <td> <?= $pedido->estado ?></td>
                                <th> Código Postal: </th>
                                <td> <?= $pedido->cp ?></td>
                                <th> Referencias: </th>
                                <td> <?= $pedido->referencias ?></td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                        <h4 class="mbr-section-title display-4"># SEGUIMIENTO: <span style="color: red;"> <?=$pedido->id_pedido?> </span></h4>
                        <p>Conserve su numero de seguimiento para darle seguimiento a su pedido. En breve recibira un correo con la confirmación de su pedido</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox">

                <div class="ibox-body">
                    <table class="table">
                        <tr>
                            <th colspan="2" style="background-color: #d6d6d6;">Resumen de Compra</th>
                        </tr>
                        <tr>
                            <td>Cantidad de productos:</td>
                            <td align="center" width="50%"><b><?= $pedido->cantArticulos ?></b></td>
                        </tr>

                        <tr>
                            <td>Fecha del Pedido:</td>
                            <td align="center"> <?=$this->m_plados->fecha_text($pedido->fecha_pedido)?> </td>
                        </tr>
                        <tr>
                            <td> ID de Pago </td>
                            <td align="center"> ************<?= substr($pedido->idPago, -6)?> </td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td align="center">$ <b><?= number_format($total/100, '2', ',', ' ') ?></b></td>
                        </tr>
                    </table>
        
                </div>
                <div class="ibox-footer">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <div class="col-md-6">
                           <a href="<?=base_url()?>index.php/plados" class="btn btn-block btn-info "> Volver al sitio </a>
                        </div>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>





        <script src="https://js.stripe.com/v3/"></script>


        <script type="text/javascript">
            function pay() {

                var stripe = Stripe('pk_test_NVhGAEKZmHWV3XJBFo4YdLCA00mxzgDIwD');


                stripe.redirectToCheckout({
                    // Make the id field from the Checkout Session creation API response
                    // available to this file, so you can provide it as parameter here
                    // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
                    sessionId: '<?= $sesion ?>'
                }).then(function(result) {
                    // If `redirectToCheckout` fails due to a browser or network
                    // error, display the localized error message to your customer
                    // using `result.error.message`.
                });
            }
        </script>