<?
$cantProductos = 0;

$sub = 0; //die(var_dump($carrito)); 
$total = round(number_format($carrito[0]['precio'] * 1.16, 2, '.', ''));;
?>
<section class="mbr-section content3 mbr-section__container mbr-after-navbar" id="content3-37" data-rv-view="319" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-4">Checkout</h3>
                <p class="mbr-section-subtitle lead">Verifique los datos y proceda al pago</p>
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
                    <div class="ibox-title">Confirmar Pedido</div>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="6" style="background-color: #d6d6d6;">Datos del cliente</th>
                            </tr>
                            <tr>
                                <th> Cliente: </th>
                                <td> <?= $usuario->aPaterno ?> <?= $usuario->aMaterno ?> <?= $usuario->nombre ?> </td>
                                <th> Teléfono Personal: </th>
                                <td><?= $usuario->celular ?></td>
                                <th> Teléfono Particular: </th>
                                <td><?= $usuario->telefono ?></td>
                            </tr>
                            <tr>
                                <th> Correo Electrónico: </th>
                                <td colspan="5"> <?= $usuario->correo ?> </td>
                            </tr>
                            <tr>
                                <th> Dirección: </th>
                                <td> <?= $usuario->calle ?> #<?= $usuario->numExterno ?>
                                    <? if (isset($usuario->numInterno)) { ?> Int. <?= $usuario->numInterno ?>
                                    <? } ?>
                                    <? if (isset($usuario->edificio)) { ?> Edificio <?= $usuario->edificio ?>
                                    <? } ?>
                                </td>
                                <th>Colonia:</th>
                                <td> <?= $usuario->colonia ?> </td>
                                <th>Ciudad:</th>
                                <td> <?= $usuario->ciudad ?> </td>
                            </tr>
                            <tr>
                                <th> Estado: </th>
                                <td> <?= $usuario->estado ?></td>
                                <th> Código Postal: </th>
                                <td> <?= $usuario->cp ?></td>
                                <th> Referencias: </th>
                                <td> <?= $usuario->referencias ?></td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                </div>
                <div class="ibox-footer">
                    <label><b>*Requiero Factura: </b></label>
                    <input type="checkbox" name="factura" id="factura">

                    <div id="datos" class="row">
                        <hr>
                        <div class="col-md-12">
                            <form id="facturacion">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Nombre:</label>
                                        <input type="text" class="form-control" required name="nombre" id="nombre" value=" <?= $usuario->nombre ?> <?= $usuario->aPaterno ?> <?= $usuario->aMaterno ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label>RFC:</label>
                                        <input type="text" class="form-control required" required name="rfc" id="rfc">
                                    </div>
                                    <div class="col-md-4">
                                        <label>CORREO:</label>
                                        <input type="email" class="form-control" value="<?= $usuario->correo ?>" required name="correo" id="correo">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>DIRECCIÓN DE FACTURACIÓN:</label>
                                        <input type="text" class="form-control" required name="direccion" id="direccion" value="">
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button id="btnGuardar" onclick="guardarDatos();" class="btn btn-rounded btn-success"> Guardar datos y solicitar factura</button>
                                </div>
                            </div>
                        </div>

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
                        <? if ($carrito != 0) { ?>
                        <div class="table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="6" style="background-color: #d6d6d6;">Detalle de Pedido</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>CONCEPTO</th>
                                        <th>COLOR</th>
                                        <th>PRECIO UNITARIO</th>
                                        <th>CANTIDAD</th>
                                        <th>SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                        foreach ($carrito as $key) {
                                            $subtotal = $key['cantidad'] * $key['precio'];
                                            $cantProductos = $cantProductos + $key['cantidad'];
                                            $sub = $sub + $subtotal;
                                        ?>
                                    <tr>
                                        <td><img class="img-rounded" src="<?= base_url() ?>src/img/<?= $key['foto'] ?>" alt="image" width="80px" />
                                        <td><?= $key['descripcion'] ?>
                                        <td><?= $key['color'] ?></td>
                                        <td>$ <?= number_format($key['precio'], '2', ',', ' ') ?></td>
                                        <td align="center"><?= $key['cantidad'] ?></td>
                                        <td>$ <?= number_format($subtotal, '2', ',', ' ') ?>

                                            <? }
                                            $total = ($sub * 1.16);
                                                ?>
                                </tbody>


                                <tr>

                            </table>
                        </div>
                        <? } ?>
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
                            <td align="center" width="50%"><b><?= $cantProductos ?></b></td>
                        </tr>

                        <tr>
                            <td>Subtotal:</td>
                            <td align="center">$ <?= number_format($sub, '2', ',', ' ') ?></td>
                        </tr>
                        <tr>
                            <td> I.V.A. </td>
                            <td align="center"> 16% </td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td align="center">$ <b><?= number_format($total, '2', ',', ' ') ?></b></td>
                        </tr>
                    </table>

                </div>
                <div class="ibox-footer">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div class="col-md-6">
                                <input type="button" onclick="pay()" class="btn btn-block btn-success " value="Pagar">
                            </div>
                            <div class="col-md-6">
                                <a href="<?= base_url() ?>index.php/plados/carrito" class="btn btn-block btn-danger "> Regresar </a>
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

            sessionId: '<?= $sesion ?>'
        }).then(function(result) {

        });
    }
</script>

<script>
    function guardarDatos() {
        form = $("#facturacion").serializeArray();


        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?= base_url() ?>index.php?/plados/datos_factura",
            data: form,
        }).done(function(respuesta) {
            console.log(respuesta);
            alertify
                .alert("PLADOS",respuesta, function() {
                    alertify.message('OK');
                });
        });

    }
</script>

<script>
    $(function() {
        $("#datos").hide('fast');
    });

    function on() {
        $("#datos").show('fast');
    }

    function off() {
        $("#datos").hide('fast');
    }

    var checkbox = document.getElementById('factura');
    checkbox.addEventListener("change", comprueba, false);

    function comprueba() {
        if (checkbox.checked) {
            on();
        } else {
            off();
        }
    }
</script>