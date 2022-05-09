<div class="form-group{{ $errors->has($start_name) ? ' has-error' : '' }}">
{{ Form::label($start_name.'__'.$end_name,  trans('table.'.$start_name.'__'.$end_name), ['class' => 'col-md-4 control-label']) }}
<div class="input-daterange input-group">
	{{ Form::text($start_name, null, array_merge(['class' => 'form-control flatdaterange','id'=>$start_name], $attributes)) }}
    <span class="input-group-addon">to</span>
   	{{-- Form::label($end_name,  trans('table.'.$end_name), ['class' => 'col-md-4 control-label']) --}}
	{{ Form::text($end_name, null, array_merge(['class' => 'form-control','id'=>$end_name], $attributes)) }}
</div>
</div>


{{	Theme::add('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}
{{	Theme::add('https://npmcdn.com/flatpickr/dist/themes/material_orange.css') }}
{{	Theme::addScript('https://cdn.jsdelivr.net/npm/flatpickr') }}
{{  Theme::add('https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/it.js') }}
{{--    Theme::addScript('https://npmcdn.com/flatpickr@4.3.2/dist/l10n/it.js') --}}
{{  Theme::add('https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js') }}
{{--    Theme::addScript('https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.3.2/plugins/rangePlugin.js') --}}

@push('scripts')
<script>
	$(function() {
		$(".flatdaterange").flatpickr({
			locale: "it",  // locale for this instance only
			mode: "range",
            altInput: true,
            altFormat: "d/m/Y H:i",
    		enableTime: true,
    		time_24hr: true,
        	timeFormat: "H:i",
    		dateFormat: "Y-m-d H:i",
    		//allowInput: true,
    		"plugins": [new rangePlugin({ input: "#{{ $end_name }}"})],
    		/*
    		onChange: function(selectedDates, dateStr, instance){
    			
    			//selectedDates[0].getFullYear() + "-" + numeroAdosCaracteres(selectedDates[0].getMonth() + 1) + "-" + numeroAdosCaracteres(selectedDates[0].getDate());
    			
    			//https://github.com/flatpickr/flatpickr/issues/678
				$('#first-input').val(selectedDates[0].getFullYear());
				$('#second-input').val(selectedDates[1].getMonth());
			},
			*/


		});
	});
</script>
@endpush