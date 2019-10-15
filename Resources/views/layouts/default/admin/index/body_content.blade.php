{!! Form::bsBtnCreateAttach(['row'=>$row]) !!} 


<a data-href="{{ Panel::get($row)->createUrl() }}" class="btn btn-primary" data-toggle="modal" data-target="#myModalAjax" data-title="plus">
	<i class="fa fa-plus"></i> 
</a>

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

	<select>
		<option>id</option>
		<option>updated_at</option>
	</select>
	<select>
		<option><i class="fas fa-sort-up"></i>Desc</option>
		<option>Asc</option>
	</select>
	<button type="submit" class="btn btn-primary">aaa<i class="fas fa-sort"></i></a></button>

</div>

<div class="row">
    <div class="col" style="overflow:auto">
@foreach($rows as $k=>$v)
	@include($_layout->item_view,['key'=>$k,'row'=>$v])
@endforeach
{{ $rows->appends(request()->query())->links() }}
</div>
  
</div>