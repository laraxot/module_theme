<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name, trans('table.'.$name), ['class' => 'col-md-10 control-label']) }}
<<<<<<< HEAD
	<div class="col-md-10">
=======
	<div class="col-md-10">	
>>>>>>> ede0df7 (first)
		{{ Form::textarea($name, $value, array_merge(['class' => 'form-control tinymce'], $attributes)) }}
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>

<<<<<<< HEAD

=======
{{ Theme::addScript('/theme/bc/jquery/dist/jquery.min.js') }}
>>>>>>> ede0df7 (first)
{{ Theme::addScript('backend::js/bsTinymce.js') }}
