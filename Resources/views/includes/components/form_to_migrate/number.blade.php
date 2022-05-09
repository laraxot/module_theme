{{--
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name, trans($view.'.field.'.$name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		<div class="datepicker-input input-group date">
		{{ Form::number($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
		<span class="input-group-addon">
            <span>.xx</span>
        </span>
        </div>
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>
--}}
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	@if(!isset($attributes['nolabel']))
	{{ Form::label($name,  trans($view.'.field.'.$name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">	
	@endif
		{{ Form::number($name, $value, array_merge(['class' => 'form-control bootstrap-number'], $attributes)) }}
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	@if(!isset($attributes['nolabel']))
	</div>
	@endif
</div>
{{ Theme::add('/theme/bc/bootstrap-number-input/bootstrap-number-input.js') }}
{{ Theme::add('backend::js/bsNumber.js') }}