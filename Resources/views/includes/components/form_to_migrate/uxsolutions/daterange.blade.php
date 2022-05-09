{{--
<div class="form-group{{ $errors->has($start_name) ? ' has-error' : '' }}">
	<div class="input-group uxdaterange">
		{{ Form::label($start_name,  trans('table.'.$start_name), ['class' => 'col-md-4 control-label']) }}
	    {{ Form::text($start_name, null, array_merge(['class' => 'form-control'], $attributes)) }}
	    <span class="input-group-addon">to</span>
	    {{ Form::label($end_name,  trans('table.'.$end_name), ['class' => 'col-md-4 control-label']) }}
	    {{ Form::text($end_name, null, array_merge(['class' => 'form-control'], $attributes)) }}
	</div>
</div>
--}}
<div class="form-group{{ $errors->has($start_name) ? ' has-error' : '' }}">
{{ Form::label($start_name.'__'.$end_name,  trans('table.'.$start_name.'__'.$end_name), ['class' => 'col-md-4 control-label']) }}
<div class="input-daterange input-group">
	{{ Form::text($start_name, null, array_merge(['class' => 'form-control'], $attributes)) }}
    <span class="input-group-addon">to</span>
   	{{-- Form::label($end_name,  trans('table.'.$end_name), ['class' => 'col-md-4 control-label']) --}}
	{{ Form::text($end_name, null, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
</div>

{{	Theme::add('/theme/bc/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
{{	Theme::add('/theme/bc/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
{{	Theme::add('/theme/bc/bootstrap-datepicker/dist/locales/bootstrap-datepicker.it.min.js') }}

{{  Theme::add('backend::includes/components/form/uxsolutions/js/bsDateRange.js') }}	

