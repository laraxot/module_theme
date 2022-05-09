<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name,  trans('table.'.$name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		<div class="datepicker-input input-group date">
		{{ Form::text($name, $value, array_merge(['class' => 'form-control flatdatetime'], $attributes)) }}
		<span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
        </div>
        {{-- Form::datetimeLocal($name, $val, array_merge(['class' => 'form-control'], $attributes)) --}}
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>

{{	Theme::add('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}
{{	Theme::add('https://npmcdn.com/flatpickr/dist/themes/material_orange.css') }}
{{	Theme::addScript('https://cdn.jsdelivr.net/npm/flatpickr') }}
{{	Theme::add('https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/it.js') }}

{{  Theme::add('backend::includes/components/form/flat/js/bsDateTime.js') }}

