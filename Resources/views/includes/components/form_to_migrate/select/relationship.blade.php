@php
$row = Form::getModel();
//dddx(get_defined_vars());
//dd(get_defined_vars()['__data']);
//$opts=$
$field = $options['field'];
$rows = $row->{$field->relationship}();
/*
 $related=$rows->getRelated();
 dddx($related);
 */
$opts = $rows->all();
$field = transFields(get_defined_vars());
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
