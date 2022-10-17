@foreach($rows  as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
<<<<<<< HEAD
{{ $rows->links('pub_theme::layouts.partials.pagination') }}
=======
{{ $rows->links('pub_theme::layouts.partials.pagination') }} 
>>>>>>> ede0df7 (first)
