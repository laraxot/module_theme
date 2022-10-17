{{-- <div class="form-group">
	<div class="col-md-4">
	</div>
	<div class="col-md-6">
	{{ Form::submit($name, array_merge(['class' => 'btn btn-success'], $attributes)) }}
	</div>
</div> --}}

@php
if (isset($options['field'])) {
    $options = $options['field']->options;
}
extract($attributes);
$field = transFields(get_defined_vars());
@endphp
<<<<<<< HEAD
{{--
=======
{{--  
>>>>>>> ede0df7 (first)
@component($blade_component, get_defined_vars())
    @slot('label')
        {{ Form::label($name, $field->label, ['class' => 'control-label']) }}
    @endslot
    @slot('input')
        {{ Form::submit($name, array_merge(['class' => 'btn btn-success'], $attributes)) }}
    @endslot
@endcomponent
--}}
<<<<<<< HEAD

        {{ Form::submit($name, array_merge(['class' => 'btn btn-success'], $attributes)) }}

=======
 
        {{ Form::submit($name, array_merge(['class' => 'btn btn-success'], $attributes)) }}
 
>>>>>>> ede0df7 (first)
