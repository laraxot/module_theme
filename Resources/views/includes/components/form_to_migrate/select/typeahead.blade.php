@php
	$field=transFields(get_defined_vars());
	$attr1=[
		'class'=>'form-control col-md-2',
		'readonly'=>'readonly',
	];
	$attr2=[
		'class'=>'form-control col-md-10 typeahead',
		'data-url'=>$attributes['data-url'],
		'data-id'=>$name,
		'data-name'=>$name,
	];
@endphp
@component($blade_component,get_defined_vars())
	@slot('label')
		{{ Form::label($name, $field->label , ['class' => 'control-label']) }}
	@endslot
	@slot('input')
		<div class="input-group mb-3">
		{{ Form::text($name, $value, $attr1) }}
		{{ Form::text('', $value, $attr2) }}
		</div>
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	@endslot
@endcomponent