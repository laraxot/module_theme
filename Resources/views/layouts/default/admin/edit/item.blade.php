@php
	if(!is_object($row)) return '';
    $fields=$_panel->editFields();

    //ddd($row->pivot->jobRoles);
    @endphp
{!! Form::bsOpen($row,'update') !!}
<div class="row">
@foreach($fields as $field)
    {!! Theme::inputHtml(['row'=>$row,'field'=>$field]) !!}
@endforeach
</div>

{{Form::bsSubmit('Modifica')}}
{!! Form::close() !!}
