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
{{Form::bs3Submit('Modifica')}}
{!! Form::close() !!}