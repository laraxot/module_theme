<form action="/billing" class="form">
	<div class="form-group">
		<label for="form-address">Address*</label>
		<input type="search" class="form-control" id="form-address" placeholder="Where do you live?" />
	</div>
	<div class="form-group">
		<label for="form-address2">Address 2</label>
		<input type="text" class="form-control" id="form-address2" placeholder="Street number and name" />
	</div>
	<div class="form-group">
		<label for="form-city">City*</label>
		<input type="text" class="form-control" id="form-city" placeholder="City">
	</div>
	<div class="form-group">
		<label for="form-zip">ZIP code*</label>
		<input type="text" class="form-control" id="form-zip" placeholder="ZIP code">
	</div>
	<div class="form-group">
		<label for="form-lat">lat</label>
		<input type="text" class="form-control" id="form-lat" placeholder="latitude">
	</div>
	<div class="form-group">
		<label for="form-lat">lng</label>
		<input type="text" class="form-control" id="form-lng" placeholder="longitude">
	</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.15.4"></script>
<script>
(function() {
  var placesAutocomplete = places({
	appId: "{{ env('ALGOLIA_APPID') }}",
	apiKey:"{{ env('ALGOLIA_APIKEY') }}",
	container: document.querySelector('#form-address'),
	templates: {
	  value: function(suggestion) {
		return suggestion.name;
	  }
	}
  }).configure({
	//type: 'address',
	countries: ['it'],
	language: 'it'
  });
  placesAutocomplete.on('change', function resultSelected(e) {
	console.log(e);
	document.querySelector('#form-address2').value = e.suggestion.administrative || '';
	document.querySelector('#form-city').value = e.suggestion.city || '';
	document.querySelector('#form-zip').value = e.suggestion.postcode || '';
	document.querySelector('#form-lat').value = e.suggestion.latlng.lat || '';
	document.querySelector('#form-lng').value = e.suggestion.latlng.lng || '';
	
  });
})();
</script>