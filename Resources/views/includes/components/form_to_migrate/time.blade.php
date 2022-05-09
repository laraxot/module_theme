@php
	if(isset($attributes['label']))
		$label=$attributes['label'];
	else
		$label=trans($view.'.field.'.$name);
	Theme::add("https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.2/flatpickr.css");
	Theme::add("https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.2/flatpickr.js");
@endphp

<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name, $label , ['class' => 'control-label']) }}
	{{ Form::time($name, $value, array_merge(['class' => 'form-control timepicker','placeholder'=>trans($view.'.field.'.$name.'_placeholder')], $attributes)) }}
	@if ( $errors->has($name) )
		<span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
	@endif
	<small class="form-text text-muted">{{ trans($view.'.field.'.$name.'_help') }} </small> 
</div>


@push('scripts')
<script>
$(document).ready(function () {
	$('.timepicker').flatpickr({
		enableTime: true,
    	noCalendar: true,
    	dateFormat: "H:i",
    	time_24hr: true
	});
});
</script>
@endpush
