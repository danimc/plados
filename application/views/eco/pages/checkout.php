<?
$cantProductos = 0;
$sub = 0; //die(var_dump($carrito)); 
$total = 0;
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
    					<a href="<?=base_url()?>index.php/plados/checkout" class="btn btn-sm btn-block btn-success"> Continuar Y Pagar </a>
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

    <script>
        // This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>




