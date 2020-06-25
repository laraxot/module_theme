{{--
{!! Theme::include('topbar',[],get_defined_vars() ) !!}
{!! Form::bsBtnCreate(['row'=>$row]) !!}
--}}
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}
