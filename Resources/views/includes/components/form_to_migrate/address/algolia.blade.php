@php
	$field=transFields(get_defined_vars());
@endphp
@component($blade_component,get_defined_vars())
	@slot('label')
		{{ Form::label($name, $field->label , ['class' => 'control-label']) }}
	@endslot
	@slot('input')
		{{ Form::text($name, $value, array_merge(['class' => 'form-control ds-input form-control-lg','placeholder'=>$field->placeholder], $attributes)) }}
		{{--
		<input
            type="text"
            data-address="{&quot;field&quot;: &quot;{{$name}}&quot;, &quot;full&quot;: false }"
            class="form-control-lg"
        >
        --}}
	@endslot
@endcomponent

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
				container: $this[0]
			});
			alert($addressConfig.field);
			function clearInput() {
				if( !$this.val().length ){
					$field.val('');
				}
			}

			if( $addressConfig.full ){

				$place.on('change', function(e){
					var result = JSON.parse(JSON.stringify(e.suggestion));
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
			}

			window.AlgoliaPlaces[ $addressConfig.field ] = $place;
		});
	});
</script>
@endpush