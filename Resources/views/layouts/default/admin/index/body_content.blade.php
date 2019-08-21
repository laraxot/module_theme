{!! Form::bsBtnCreateAttach(['row'=>$row]) !!} 
<<<<<<< HEAD
@foreach($_panel->actions() as $act)
	{!! $act->btn() !!}
@endforeach

@include('adm_theme::layouts.partials.forms.search') {{--  forse fare form macro --}}
=======
@foreach($_panel->containerActions() as $act)
	{!! $act->btn() !!}
@endforeach
{{--
@include('adm_theme::layouts.partials.forms.search') 
--}}
<div class="row">
    <div class="col">
        <p><span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span> 
        	{{ Str::plural($row->post_type ?? class_basename($row),$rows->total()) }}</p>
    </div>
	@include('adm_theme::layouts.partials.forms.search')
</div>

>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
@foreach($rows as $k=>$v)
	@include($_layout->item_view,['key'=>$k,'row'=>$v])
@endforeach
{{ $rows->links() }}
