@php
	if(!isset($related)){
		return 'RELATED NOT SET ['.__LINE__.']['.__FILE__.']';
	}
@endphp
<fieldset class="form-group container-fluid border p-2" {{-- $disabled --}} >
    <legend class="col-form-label col-sm-2 pt-0 w-auto">
	</legend>
	<div class="row">
		<div class="col-md-8">
			@foreach($related as $k => $v)
			<div class="row">
				@foreach($pivot_fields as $pf)
				@php
					$name_dot=$v->post_id.'.pivot.'.$pf->name.'';
					$rows=$rows->keyBy('post_id');
					$value=Arr::get($rows,$name_dot);
				@endphp
				{!! Theme::inputFreeze(['row'=>$row,'value'=>$value,'label'=>$v->title,'field'=>$pf])!!}
				@endforeach
			</div>
			@endforeach
		</div>
		<div class="col-md-4">
			@foreach($pivot_panel->actions() as $act)
			{!! $act->btn(['row'=>$row]) !!}
			@endforeach
		</div>
	</div>
</fieldset>
