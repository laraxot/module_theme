@php
	if(!is_object($row)) return '';
	$fields=$_panel->createFields();
@endphp

{!! Form::bsOpen($row,'store') !!}
<div class="row">
@foreach($fields as $field)
	{!! Theme::inputHtml(['row'=>$row,'field'=>$field]) !!}
@endforeach
</div>
{{Form::bsSubmit('Save')}}
{!! Form::close() !!}
