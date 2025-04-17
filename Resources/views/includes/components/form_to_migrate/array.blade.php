@php
	if(!isset($options['prefix'])){
		$options['prefix']=$name;
	}
	//$attributes['label']=$name;
@endphp

<fieldset class="form-group container-fluid border p-2"  >
	<legend class="col-form-label col-sm-2 pt-0 w-auto"><h3>{{ $name }}</h3></legend>
	@foreach($value as $k=>$v)
		@if(is_array($v))
			@php
				$options['prefix']=$options['prefix'].'.'.$k;
			@endphp
			{{ Form::bsArray($k,$v,$attributes,$options) }}
		@else
			@php
				$attributes['label']=$k;
			@endphp
			{{ Form::bsText($options['prefix'].'.'.$k,$v,$attributes) }}
		@endif
	@endforeach
</fieldset>
