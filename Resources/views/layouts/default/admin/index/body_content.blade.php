{{-- 
<div class="row text-dark" style="background-color: #e9ecef; padding:5px; ">
	{!! Form::bsBtnCreateAttach(['row'=>$row]) !!} 
	@can('create',$row)
	<a data-href="{{ Panel::get($row)->createUrl() }}" class="btn btn-primary" data-toggle="modal" data-target="#myModalAjax" data-title="plus">
		<i class="fa fa-plus"></i> 
	</a>
	@endcan
	@foreach($_panel->containerActions() as $act)
		{!! $act->btn() !!}
	@endforeach

    <div class="col">
        <p>
        	<span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span> 
        	{{ Str::plural($row->post_type ?? class_basename($row),$rows->total()) }}
        </p>
    </div>
	@include('formx::includes.components.form_complete.search')
	@include('formx::includes.components.form_complete.order_by')
</div>

<br/>
--}}
<div class="row">
    <div class="col" style="overflow:auto">
		@foreach($rows as $k=>$v)
			@include($_layout->item_view,['key'=>$k,'row'=>$v])
		@endforeach
		{{ $rows->appends(request()->query())->links() }}
	</div>
</div>