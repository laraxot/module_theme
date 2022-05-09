@php
	//Theme::add('theme/bc/popper.js/dist/popper.js');
	//Theme::add('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js');
	// popper aggiunto in webpack
	if(isset($attributes['label']))
		$label=$attributes['label'];
	else
		$label=trans($view.'.field.'.$name);
	$placeholder=trans($view.'.field.'.$name.'_placeholder');
@endphp 

<div class="input-group mb-2">
	<input type="search" name="{{ $name }}" id="autocomplete" class="form-control ds-input form-control-lg" placeholder="{{ $placeholder }}" required />
	<div class="input-group-prepend">
    	<div class="input-group-btn">
      		<button type="submit" class="btn theme-btn btn-lg"><i class="fa fa-search"></i></button>
      	</div>
    </div>
</div>
<div style="display:none">
	@if(isset($attribute['only']))
		@foreach($attribute['only'] as $field)
			<input name="{{ $field }}" ></input>
		@endforeach
	@else
	<input name="lat" ></input>
	<input name="lng" ></input>
	<input name="route"	></input>
	<input name="street_number"	></input>
	<input name="locality" ></input>
	<input name="administrative_area_level_1" ></input>
	<input name="postal_code" ></input>
	<input name="country" ></input>
	@endif
</div>

@push('scripts')
<script>
	$(document).ready(function(){
		$("#autocomplete").focus(function() {
    		geolocate();
		});

		$("#addressform").on('submit', function( e ){
			//var stop=false;
			//e.preventDefault();

			var address = $('#autocomplete').val();
			geocoder = new google.maps.Geocoder();
			geocoder.geocode( { 'address': address }, function(results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
					fillFields(results[0]);
					$('#autocomplete').val(results[0].formatted_address);
				} 
				//console.log(results);
			});

			if($('input[name="locality"]').val()==''){
				showPopoverMessage( '#autocomplete', 'Inserisci un indirizzo completo', 'top' );	
				e.preventDefault();return false;
			}
			if($('input[name="lat"]').val()==''){
				showPopoverMessage( '#autocomplete', 'Inserisci non riconosciuto', 'top' );	
				e.preventDefault();return false;
			}
			/*
			if($('input[name="address"]').val()==''){
				showPopoverMessage( '#autocomplete', 'Inserisci un indirizzo completo', 'top' );	
				e.preventDefault();return false;
			}
			*/
			/*
			if($('input[name="street_number"]').val()==''){
				showPopoverMessage( '#autocomplete', 'Manca numero civico', 'top' );	
				e.preventDefault();return false;
			}
			*/
			//return false;
			
			//$("#addressform").trigger( 'submit' );
			$("#addressform").submit();
			
			//return false;
		});
	});
	

	// This example displays an address form, using the autocomplete feature
	// of the Google Places API to help users fill in the information.
	
	// This example requires the Places library. Include the libraries=places
	// parameter when you first load the API. For example:
	// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
	
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
		  // Create the autocomplete object, restricting the search to geographical
		  // location types.
		  autocomplete = new google.maps.places.Autocomplete(
		      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
		      {types: ['geocode']});

		  // When the user selects an address from the dropdown, populate the address
		  // fields in the form.
		  autocomplete.addListener('place_changed', fillInAddress);
	}
	
	function fillInAddress() {
		// Get the place details from the autocomplete object.
		//hidePopoverMessage( '#autocomplete' );
		var place = autocomplete.getPlace();
		fillFields(place);		
		
	}

	function fillFields(place){
		//console.log(place);
		for (var component in componentForm) {
			//document.getElementById(component).value = '';
			//document.getElementById(component).disabled = false;
			//alert(component);
			$('input[name="'+component+'"]').val('');
		}
		if(place.geometry!=undefined){
			$('input[name="lat"]').val(place.geometry.location.lat());
			$('input[name="lng"]').val(place.geometry.location.lng());
		}
		// Get each component of the address from the place details
		// and fill the corresponding field on the form.
		if(place.address_components!=undefined){
			for (var i = 0; i < place.address_components.length; i++) {
				var addressType = place.address_components[i].types[0];
				if (componentForm[addressType]) {
					var val = place.address_components[i][componentForm[addressType]];
					//document.getElementById(addressType).value = val;
					$('input[name="'+addressType+'"]').val(val);
				}
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
				var circle = new google.maps.Circle({
					center: geolocation,
					radius: position.coords.accuracy
				});
				autocomplete.setBounds(circle.getBounds());
			});
		}
	}


	function showPopoverMessage( input, message, placement ) {
		$(input).addClass('address-insert-incomplete').popover({
			html : true,
			content : message,
			placement: placement
		}).popover('show');
	}

	function hidePopoverMessage( input ) {
		$(input).removeClass('address-insert-incomplete').popover('destroy');
	}




</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=it&key={{ config('services.google.maps_key') }}&libraries=places&callback=initAutocomplete" async defer></script>

  
@endpush