@php
 	Theme::add('/theme/pub/dist/js/app.js',1);
@endphp

@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('adm_theme::txt.close')</button>
	{{--
	<button type="submit" class="btn btn-primary">@lang('adm_theme::txt.add_new')</button>
	--}}
</div>