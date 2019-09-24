{{--
{!! Form::bsOpen($row,'update') !!}
<div class="row">
@foreach($_panel->fields() as $field)
@php
	$input='bs'.Str::studly($field->type);
	$input_name=collect(explode('.',$field->name))->map(function ($v, $k){
		return $k==0?$v:'['.$v.']';
	})->implode('');
	$input_value=(isset($field->value)?$field->value:null);
@endphp
<div class="col-sm-{{ isset($field->col_bs_size)?$field->col_bs_size:12 }}">
	{!! Form::$input($input_name) !!}
</div>
@endforeach
</div>
{{Form::bsSubmit('Modifica')}}
{!! Form::close() !!}
--}}
@php
	if(!is_object($row)) return '';
	$fields=$_panel->editFields();
@endphp

{!! Form::bsOpen($row,'update') !!}
<div class="row">
@foreach($fields as $field)
	{!! Theme::inputHtml(['row'=>$row,'field'=>$field]) !!}
@endforeach
</div>
{{Form::bsSubmit('Modifica')}}
{!! Form::close() !!}