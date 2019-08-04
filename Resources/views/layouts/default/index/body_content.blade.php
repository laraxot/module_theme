{{--
{!! Form::bsBtnCreate(['row'=>$row]) !!}
{!! Form::bsBtnCreateAttach(['row'=>$row]) !!} 
@foreach($_panel->actions() as $act)
	{!! $act->btn() !!}
@endforeach
--}}

<div class="row">
    <div class="col">
        <p><span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span> {{ Str::plural($row->post_type) }}</p>
    </div>
	@include('pub_theme::layouts.partials.forms.search')
</div>

@foreach($rows  as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links('pub_theme::layouts.partials.pagination') }}
