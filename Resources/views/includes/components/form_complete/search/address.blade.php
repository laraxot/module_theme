<form class="form" method="GET" action="{{ $action }}" data-url="{{ $action }}" id="formaddress">
	<div style="display:none">
		<input type="text" name="city" >
  		<input type="text" name="lat" >
  		<input type="text" name="lng" >
  	</div>
	<div class="row">
		<div class="col-md-11" id="input-styling-address">
			<input type="hidden" name="{{ $input_name }}" class="form-control form-control-lg" />
			<input type="text" data-address="{&quot;field&quot;: &quot;{{$input_name}}&quot;}"  class="form-control" />
		</div>
		<div class="col-md-1">
			<button class="btn btn-info" type="submit">
    			<i class="fa fa-search"></i>
  			</button>
		</div>
  </div>
  </form>

@push('styles')
{{--
	leggi questo per cambiare colori, nel dropdown di algolia places
	https://community.algolia.com/places/documentation.html
--}}

<style>
.ap-suggestion { color:darkblue; text-align:left; border-bottom: 1px solid #efefef; }
.ap-address { color:darkgreen; }
</style>
@endpush  

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/places.js@1.11.0"></script>
<script>
	$(document).ready(function(){
		window.AlgoliaPlaces = window.AlgoliaPlaces || {};

		$('[data-address]').each(function(){
			var $this      = $(this),
			$addressConfig = $this.data('address'),
			$field = $('[name="'+$addressConfig.field+'"]'),
			$place = places({
				//appId: '<YOUR_PLACES_APP_ID>',
    			//apiKey: '<YOUR_PLACES_API_KEY>',
				container: $this[0],
				style: true
			});
			function clearInput() {
				if( !$this.val().length ){
					$field.val('');
				}
			}

			$place.on('change', function(e){
				//console.log(e.suggestion);
				var result = JSON.parse(JSON.stringify(e.suggestion));
				$form=$('#formaddress');

				var $url=$form.data('url')+'#'+result.latlng.lat+','+result.latlng.lng+',13z';
				$form.attr('action',$url);

				$('input[name=lat]').val(result.latlng.lat);
				$('input[name=lng]').val(result.latlng.lng);
				$('input[name=city]').val(result.city);
				
				delete(result.highlight); delete(result.hit); delete(result.hitIndex);
				delete(result.rawAnswer); delete(result.query);
				
				$field.val( JSON.stringify(result) );

			});

			$this.on('change blur', clearInput);
			$place.on('clear', clearInput);

			if( $field.val().length ){
				var existingData = JSON.parse($field.val());
				$this.val(existingData.value);
			}

			window.AlgoliaPlaces[ $addressConfig.field ] = $place;




		});
	});
</script>
@endpush