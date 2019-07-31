@php
	/*
	if(!\View::exists($view.'.form') && !\View::exists($view_default.'.form.'.$edit_type) ) {
		ddd('non esiste ne ['.$view.'.form'.'] ne ['.$view_default.'.form.'.$edit_type.']');
	}
	*/	
@endphp
<div class="widget">
	<div class="widget-body">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $k=>$error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@include($_layout->item_view)
		{{--
		@includeFirst(
			[
				$view.'.form',
				$view_default.'.form.'.$edit_type
			]
		)
		--}}
	</div>
</div>