<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name,  trans('table.'.$name), ['class' => 'col-md-4 control-label']) }}
<<<<<<< HEAD
	<div class="col-md-6">
=======
	<div class="col-md-6">	
>>>>>>> ede0df7 (first)
		{{ Form::text($name, $value, array_merge(['class' => 'form-control geocomplete'], $attributes)) }}
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>

<<<<<<< HEAD

=======
{{  Theme::addScript('/theme/bc/jquery/dist/jquery.min.js') }}
>>>>>>> ede0df7 (first)
{{  Theme::addScript('/theme/js/bsGeo.js') }}