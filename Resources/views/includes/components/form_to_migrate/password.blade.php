@php
	/*
	if(isset($attributes['label']))
		$label=$attributes['label'];
	else
		$label=trans($view.'.field.'.$name);
	*/
	$field=transFields(get_defined_vars());
@endphp
@component($blade_component,get_defined_vars())
	@slot('label')
		{{ Form::label($name, $field->label , ['class' => 'control-label']) }}
	@endslot
	@slot('input')
		{{ Form::password($name, $field->attributes) }}
	@endslot
@endcomponent
