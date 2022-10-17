@php
    $value=Form::getValueAttribute($name);
    $model=Form::getModel();
    $alertError = trans($view.'.field.'.$name.'_alert');
    Theme::add('theme::js/edit_in_place.js');
    Theme::add('/theme/bc/sweetalert2/dist/sweetalert2.css');
    Theme::add('/theme/bc/sweetalert2/dist/sweetalert2.min.js');
    $placeholder=trans($view.'.field.'.$name.'_placeholder');
@endphp
<div class="input-group">
	<div class="input-group-prepend">
		<i class="fa fa-map-marker btn btn-secondary" aria-hidden="true"></i>
	</div>
{{--
<p class="editinplace col-lg-8 address" id="autocomplete" style="float:left;" data-url="{{ $model->update_url }}" data-field="{{ $name }}" data-prev-value="" data-null-error="{{ $alertError }}">{{ $value }}</p>
--}}
{{ Form::text($name, $value, array_merge(['class' => 'form-control geocomplete','placeholder'=>$placeholder], $attributes)) }}
<div class="input-group-append">
	<button type="submit" name="_action" value="come_back">
		<i class="fa fa-check"></i>
	</button>
</div>
</div>
<div style="display:none">
	@php
		$address_fields=['lat','lng','route','street_number','locality','administrative_area_level_1','postal_code','country'];
		foreach($address_fields as $af){
			echo Form::text($af);
		}
	@endphp
</div>

@push('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=it&key={{ config('services.google.maps_key') }}&libraries=places&callback=initAutocomplete" async defer></script>
<script>
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
		var input = document.getElementsByClassName('geocomplete');
<<<<<<< HEAD
		for (i = 0; i < input.length; i++) {
=======
		for (i = 0; i < input.length; i++) { 
>>>>>>> ede0df7 (first)
			autocomplete = new google.maps.places.Autocomplete(
		      	//$('.address'),
		      	//(document.getElementById('autocomplete')),
		      	input[i],
		      	{types: ['geocode']}
		  	);
		};

		  // When the user selects an address from the dropdown, populate the address
		  // fields in the form.
		  autocomplete.addListener('place_changed', fillInAddress);
	}
<<<<<<< HEAD

=======
	
>>>>>>> ede0df7 (first)
	function fillInAddress() {
		// Get the place details from the autocomplete object.
		//hidePopoverMessage( '#autocomplete' );
		var place = autocomplete.getPlace();
<<<<<<< HEAD
		fillFields(place);

=======
		fillFields(place);		
		
>>>>>>> ede0df7 (first)
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

</script>
@endpush
