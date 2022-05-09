@php
	$label=isset($attributes['label'])?$attributes['label']:trans($view.'.field.'.$name);
	$placeholder=trans($view.'.field.'.$name.'_placeholder');
	Theme::add('theme/bc/typeahead.js/dist/typeahead.bundle.js');
	//Theme::add('backend::js/bsTypeahead.js');
	Theme::add(str_replace('.','/',$comp_view).'/js/bsTypeahead.js');
	$field=transFields(get_defined_vars());
@endphp

@component($blade_component,get_defined_vars())
	@slot('label')
		{{ Form::label($name,   trans($view.'.field.'.$name), ['class' => 'control-label']) }} {{-- sr-only  --}}
	@endslot
	@slot('input')
		<div class="form-group search_container">
			{{ Form::text($name, $value, array_merge([
						'class' => 'form-control form-control-lg typeahead search-input'
						,'placeholder'=> trans($view.'.field.'.$name)
						], $attributes)) }}
		</div>
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	@endslot
@endcomponent

 
