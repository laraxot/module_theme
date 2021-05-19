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

<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('adm_theme::txt.close')</button>
	<button type="submit" class="btn btn-primary">@lang('formx::txt.update')</button>
</div>
{!! Form::close() !!}