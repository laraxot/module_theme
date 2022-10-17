@php
    extract($attributes);
<<<<<<< HEAD

=======
    
>>>>>>> ede0df7 (first)
    $opts=\Modules\Blog\Models\Label::where('label_type',$label_type)
        ->get()
        ->pluck('title','label_id');


	$field=transFields(get_defined_vars());
<<<<<<< HEAD
	//$opts=$options['field']->options;
=======
	//$opts=$options['field']->options; 
>>>>>>> ede0df7 (first)
	//$field=transFields(get_defined_vars());
	//dddx($field);
@endphp

@component($blade_component,get_defined_vars())
	@slot('label')
	{{ Form::label($name, $field->label , ['class' => 'control-label']) }}
	@endslot
	@slot('input')
		{{ Form::select($name,$opts,$value, $field->attributes) }}
	@endslot
@endcomponent
