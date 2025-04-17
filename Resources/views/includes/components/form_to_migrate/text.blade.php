@php
	$field=transFields(get_defined_vars());
@endphp
@component($blade_component,get_defined_vars())
	@slot('label')
		{{ Form::label($name, $field->label , ['class' => 'control-label']) }}
	@endslot
	@slot('input')
		{{ Form::text($name, $value, array_merge(['class' => 'form-control','placeholder'=>$field->placeholder], $attributes)) }}
	@endslot
@endcomponent