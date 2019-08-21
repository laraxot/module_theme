{{--
@foreach($rows  as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links('pub_theme::layouts.partials.pagination') }} 
--}}
@php
$types=camel_case(str_plural($params['container1']));
$last_item=$params['item0'];
 Theme::add('/theme/pub/dist/js/app.js',1);
 //ddd($_panel);
@endphp

<<<<<<< HEAD

{!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
{{ Form::bsMultiSelect2Sides($types) }}
{{Form::bsSubmit('Salva') }}
{{-- 
{{ Theme::showScripts(false) }}
{!! Theme::showStyles(false) !!}
{!! Theme::showScripts(false) !!}
@stack('scripts')
--}}
=======
{{--  
{!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
{{ Form::bsMultiSelect2Sides($types) }}
{{Form::bsSubmit('Salva') }}
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
<a class="btn btn-primary btntest">test</a>

<script>
	$('.btntest').on( "click", function(event) {
		event.preventDefault();
  		alert('jquery loaded');
  	});
<<<<<<< HEAD
</script>
=======
</script>

{!! Form::bsBtnCreate(['row'=>$row]) !!}
--}}
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
