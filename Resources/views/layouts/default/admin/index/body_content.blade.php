{!! Form::bsBtnCreateAttach(['row'=>$row]) !!} 
@foreach($_panel->actions() as $act)
	{!! $act->btn() !!}
@endforeach

@include('adm_theme::layouts.partials.forms.search') {{--  forse fare form macro --}}
@foreach($rows as $k=>$v)
	@include($_layout->item_view,['key'=>$k,'row'=>$v])
@endforeach
{{ $rows->links() }}
