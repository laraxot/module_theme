@php
    $val=Form::getValueAttribute($name);
    if($val===null) {
        $val=\Carbon\Carbon::now(); // +"date": "2017-10-18 11:22:50.429984"
                                    // +"timezone_type": 3
                                    // +"timezone": "UTC"
    }
    if($value!==null) $val=$value;
@endphp

<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name,  trans('table.'.$name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		<input type="date" class="form-control" />
        <input type="time" class="form-control" />
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>


@push('scripts')
<script src="https://afarkas.github.io/webshim/js-webshim/minified/polyfiller.js"></script>
<script type="text/javascript">
webshim.setOptions('forms-ext', {
    replaceUI: 'auto'
});

//set language/UI dateformat || or use lang attribute on html element
//webshims.activeLang('hu'); // hu == hungary

webshim.polyfill('forms forms-ext');


$(function () {
    $('.check-validity').on('click', function () {
        $(this).jProp('form').checkValidity();
        return false;
    });
});

</script>
@endpush