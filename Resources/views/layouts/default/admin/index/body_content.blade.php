{!! Form::bsBtnCreateAttach(['row'=>$row]) !!} 
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

@foreach($rows as $k=>$v)
	@include($_layout->item_view,['key'=>$k,'row'=>$v])
@endforeach
{{ $rows->links() }}
