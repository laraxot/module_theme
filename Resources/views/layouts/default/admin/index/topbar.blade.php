<div class="row text-dark" style="background-color: #e9ecef; padding:5px; ">
	{!! Form::bsBtnCreateAttach(['row'=>$row]) !!} 
	{{--  
	@can('create',$row)
	<a data-href="{{ Panel::get($row)->createUrl() }}" class="btn btn-primary" data-toggle="modal" data-target="#myModalAjax" data-title="plus">
		<i class="fa fa-plus"></i> 
	</a>
	@endcan
	--}}  
	@foreach($_panel->containerActions() as $act)
		@php
			try{
				echo $act->btn();
			}catch(\Exception $e){
				ddd($act);
			}
		@endphp
	@endforeach
	{{--  
	<a href="{{ request()->fullUrlWithQuery(["_act"=>"xls"]) }}" class="btn btn-primary" data-toggle="tooltip" title="XLS">
		<i class="far fa-file-excel fa-1x"></i>
	</a>	
    --}}
    <div class="col">
        <p>
        	<span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span> 
        	{{ Str::plural($row->post_type ?? class_basename($row),$rows->total()) }}
        </p>
    </div>
    
	@include('formx::includes.components.form_complete.search')
	@include('formx::includes.components.form_complete.order_by')
</div>