<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name,  trans('table.'.$name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		<div class="datepicker-input input-group date">
        @php
            $val=Form::getValueAttribute($name);

            if($val===null) {
            	$val=\Carbon\Carbon::now(); // +"date": "2017-10-18 11:22:50.429984"
  											// +"timezone_type": 3
  											// +"timezone": "UTC"
            }
            if($value!==null) $val=$value;
            
        @endphp
        
		{{ Form::datetimeLocal($name,$val, array_merge(['class' => 'form-control'], $attributes)) }}
		<span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
        </div>
        
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>


{{--	Theme::addStyle('/theme/bc/bootstrap-daterangepicker/daterangepicker.css') --}}

{{--  Theme::addScript('/theme/bc/jquery/dist/jquery.min.js') --}}
{{--	Theme::addScript('/theme/bc/moment/min/moment.min.js') --}}
{{--	Theme::addScript('/theme/bc/bootstrap-daterangepicker/daterangepicker.js') --}}
{{--  Theme::addScript('backend::js/bsDateTime.js') --}}

{{-- 
https://gist.github.com/brunoti/53bd7b3501e3626a9baa
 --}}

@push('scripts')
<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>

webshim.setOptions('forms', {
    lazyCustomMessages: true,
    addValidators: true
});

webshim.setOptions('forms-ext', {
    replaceUI: 'auto'
});

//start polyfilling
webshim.polyfill('forms forms-ext');
    
</script>
@endpush