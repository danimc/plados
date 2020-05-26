<?
$cantProductos = sizeof($carrito);
$sub = 0; //die(var_dump($carrito)); 
$total = round(number_format($carrito[0]['precio'] * 1.16, 2, '.', ''));;
?>
<section class="mbr-section content3 mbr-section__container mbr-after-navbar" id="content3-37" data-rv-view="319" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-4">Carrito de Compras</h3>
                <p class="mbr-section-subtitle lead">Checkout</p>
            </div>
        </div>
    </div>    
</section>


	<div class="page-content ">
		<div class="row">
			<div class="ibox col-md-8">
                <div class="ibox-head">
                    <div class="ibox-title"> Datos de cliente</div>
                </div>
    			<div class="ibox-body">
                    <form method="POST" action="">
                        <div class="col-md-12 form-group">
                            <div class="col-md-4">
                                <input type="text" name="nombre" required="true" class="form-control-sm" placeholder="Nombre*">
                            </div>
                            <div class="col-md-4">                                
                                <input type="text" name="aPterno" required="true" class="form-control-sm" placeholder="Apellido Paterno*">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="aMaterno" class="form-control-sm" placeholder="Apellido Materno*">
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-4">
                                <input type="text" name="correo" required="true" class="form-control-sm" placeholder="Correo Electrónico*">
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="lada" required="true" class="form-control-sm" placeholder="Lada*">
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="numero" required="true" class="form-control-sm" placeholder="telefono*" 
                                 maxlength="10">
                            </div>
                        </div>
                    </form>         
    			</div>
    		</div>

<!--    <div class=" col-md-8">
                <div class="ibox-body">
                    <div id="locationField">
  <input id="autocomplete"
         placeholder="Enter your address"
         onFocus="geolocate()"
         type="text"/>
</div>

<!-- Note: The address components in this sample are typical. You might need to adjust them for
           the locations relevant to your app. For more information, see
     https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
--

<table id="address">
  <tr>
    <td class="label">Street address</td>
    <td class="slimField"><input class="field" id="street_number" disabled="true"/></td>
    <td class="wideField" colspan="2"><input class="field" id="route" disabled="true"/></td>
  </tr>
  <tr>
    <td class="label">City</td>
    <td class="wideField" colspan="3"><input class="field" id="locality" disabled="true"/></td>
  </tr>
  <tr>
    <td class="label">State</td>
    <td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true"/></td>
    <td class="label">Zip code</td>
    <td class="wideField"><input class="field" id="postal_code" disabled="true"/></td>
  </tr>
  <tr>
    <td class="label">Country</td>
    <td class="wideField" colspan="3"><input class="field" id="country" disabled="true"/></td>
  </tr>
</table>
 Replace the value of the key parameter with your own API key. --
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA2RIoVAIhRjWbUcQfftUwpSE0eZd9OmNQ&libraries=places&callback=initAutocomplete"
        async defer></script>
                </div>
            </div> -->

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
    					<a onclick="pay()" class="btn btn-sm btn-block btn-success"> Continuar Y Pagar </a>
    				</div>
    			</div>    			
    		</div>   	 
		

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

   
<script src="https://js.stripe.com/v3/"></script>

  
<script type="text/javascript">
  
  function pay() {

     var stripe = Stripe('pk_test_NVhGAEKZmHWV3XJBFo4YdLCA00mxzgDIwD');


  stripe.redirectToCheckout({
  // Make the id field from the Checkout Session creation API response
  // available to this file, so you can provide it as parameter here
  // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
    sessionId: '<?=$sesion?>'
  }).then(function (result) {
  // If `redirectToCheckout` fails due to a browser or network
  // error, display the localized error message to your customer
  // using `result.error.message`.
});
  }
</script>