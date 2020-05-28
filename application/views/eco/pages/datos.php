<section class="mbr-section content3 mbr-section__container mbr-after-navbar" id="content3-37" data-rv-view="319" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-4">Datos de envío</h3>
                <p class="mbr-section-subtitle lead">Por favor ingresa la información requerida para finalizar tu compra</p>
            </div>
        </div>
    </div>
</section>

<div class="page-content ">
    <form action="<?=base_url()?>index.php/plados/guardar_datos" method="POST">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title"> Datos de cliente</div>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <input type="text" name="nombre" required="true" class="form-control " placeholder="Nombre*">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="aPaterno" required="true" class="form-control" placeholder="Apellido Paterno*">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="aMaterno" class="form-control" placeholder="Apellido Materno*">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <input type="text" name="correo" required="true" class="form-control" placeholder="Correo Electrónico*">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="celular" required="true" class="form-control" placeholder="Telefono Personal*" maxlength="10">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="telefono"  class="form-control" placeholder="telefono Particular" maxlength="10">
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
                <div class="ibox-head">
                    <div class="ibox-title"> Datos de Envío</div>
                </div>
                <div class="ibox-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <input type="text" name="Calle" required="true" class="form-control" placeholder="Calle*">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="NumExterno" required="true" class="form-control" placeholder="Num Externo*">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="NumInterno" class="form-control" placeholder="Num. Interno">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="edificio" class="form-control" placeholder="Edificio">
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-4">
                                <select id="estados" name="estado" required="true" class="form-control"></select>
                            </div>
                            <div class="col-md-2">
                                <input type="number" max="99999" name="cp" required="true" class="form-control" placeholder="Código Postal*">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="ciudad" class="form-control" placeholder="ciudad">
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="colonia" required="true" class="form-control" placeholder="Colonia">
                            </div>

                        </div>
                        <div class="col-md-12 form-group">
                    <div class="col-md-12">
                        <textarea name="referencias" class="form-control" placeholder="referencias"></textarea>
                    </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-block btn-success " value="Guardar y Terminar">
                        </div>
                        <div class="col-md-6">
                           <a href="<?=base_url()?>index.php/plados/carrito" class="btn btn-block btn-danger "> Regresar </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
</div>

<!--
        <div class="ibox col-md-8">
            <div class="ibox-head">
                <div class="ibox-title"> Datos de Envío</div>
            </div>
            <div class="ibox-body">
                <div class="col-md-12 form-group">
                    <div class="col-md-4">
                        <input type="text" name="Calle" required="true" class="form-control-sm" placeholder="Calle*">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="NumExterno" required="true" class="form-control-sm" placeholder="Num Externo*">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="NumInterno" class="form-control-sm" placeholder="Num. Interno">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="edificio" class="form-control-sm" placeholder="Edificio">
                    </div>

                </div>
                <div class="col-md-12 form-group">
                    <div class="col-md-4">

                        <select id="estados" name="estado" required="true" class="form-control-sm"></select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" max="99999" name="cp" required="true" class="form-control-sm" placeholder="Código Postal*">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="ciudad" class="form-control-sm" placeholder="ciudad">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="colonia" required="true" class="form-control-sm" placeholder="Colonia">
                    </div>

                </div>
                <div class="col-md-12 form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" placeholder="referencias"></textarea>
                    </div>
                </div>
                </form>
            </div>
        </div>

-->


<script >
    $(function () {

    var estados = $("#estados");

    $.ajax({
      type: "GET",
      dataType: 'json',
      url: 'http://datamx.io/dataset/73b08ca8-e955-4ea5-a206-ee618e26f081/resource/9c5e8302-221c-46f2-b9f7-0a93cbe5365b/download/estados.json',
      beforeSend: function () {
        //estados.prop('disabled', true);
      },
      success: function (r) {
         estados.find('option').remove();

        $(r).each(function(i, v){ // indice, valor
            estados.append('<option value="' + v.id + '">' + v.name +  '</option>');
        })
        
      },
      error: function () {
        alert('Algo no salio bien...');
      }
    });
})
</script>
