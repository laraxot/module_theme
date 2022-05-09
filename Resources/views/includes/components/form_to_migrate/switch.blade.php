<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	@if(!isset($attributes['nolabel']))
	{{ Form::label($name,  trans($view.'.field.'.$name), ['class' => 'col-md-4 control-label']) }}
	@endif
	<div class="col-md-6">	
		{{ Form::checkbox($name, $value,$checked,array_merge(['class' => 'form-control bootstrap-switch'], $attributes)) }}
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>

{{ Theme::add('theme/bc/bootstrap-switch/bootstrap-switch.js') }}
{{ Theme::add('backend::js/bsSwitch.js') }}

