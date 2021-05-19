@php
	if(!is_object($row)) return '';
	$fields=$_panel->createFields();
@endphp
{!! Form::bsOpen($row,'store') !!}
@foreach($fields as $field)
	{!! Theme::inputHtml(['row'=>$row,'field'=>$field]) !!}
@endforeach
{{ $_panel->btnSubmit() }}
{!! Form::close() !!}