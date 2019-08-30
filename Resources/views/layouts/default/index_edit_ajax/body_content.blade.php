@php
	Theme::add('/theme/pub/dist/js/app.js',1);
@endphp

{{--  
{!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
{{ Form::bsMultiSelect2Sides($types) }}
{{Form::bsSubmit('Salva') }}
<a class="btn btn-primary btntest">test</a>

<script>
	$('.btntest').on( "click", function(event) {
		event.preventDefault();
  		alert('jquery loaded');
  	});
</script>

{!! Form::bsBtnCreate(['row'=>$row]) !!}
--}}
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}
