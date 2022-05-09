@php
//dddx(get_defined_vars());

$field = transFields(get_defined_vars());
$opts = $options['field']->options;
//$field=transFields(get_defined_vars());
//dddx($field);
@endphp

@component($blade_component, get_defined_vars())
    @slot('label')
        {{ Form::label($name, $field->label, ['class' => 'control-label']) }}
    @endslot
    @slot('input')
        {{ Form::select($name, $opts, $value, $field->attributes) }}
    @endslot
@endcomponent
