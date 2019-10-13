@php
 	Theme::add('/theme/pub/dist/js/app.js',1);
@endphp
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}
