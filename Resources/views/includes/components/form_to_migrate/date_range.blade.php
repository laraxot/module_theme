@php
$name=$start_name.'__'.$end_name;
@endphp
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name,  trans('table.'.$name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		@php
		//$val=Form::getValueAttribute($name);
		//$val1=\Carbon\Carbon::parse($val)->formatLocalized('%d/%m/%Y %H:%M'); // da errore perche' son 2 date
		$format='d/m/Y';
		$start_val=Form::getValueAttribute($start_name);
		
		if(is_string($start_val)){
			$start_val_carbon=\Carbon\Carbon::parse($start_val)->formatLocalized('%d/%m/%Y');
		}else{
			$start_val_carbon=$start_val->formatLocalized('%d/%m/%Y');
		}
		$end_val=Form::getValueAttribute($end_name);

		if(is_string($end_val)){

			$end_val_carbon=\Carbon\Carbon::parse(trim($end_val))->formatLocalized('%d/%m/%Y');
			//$end_val_carbon=$end_val;
		}else{
			$end_val_carbon=$end_val->formatLocalized('%d/%m/%Y');
		}

		$val1=$start_val_carbon.' - '.$end_val_carbon;
		
		//echo '<br/> start_name :'.$start_name;
		//echo '<br/> start_val :'.$start_val;
		//echo '<br/> val1 :'.$val1;
		//echo '<h3>start_val ['.$start_val.']</h3>';
		//echo '<h3>start_val_carbon ['.$start_val_carbon.']</h3>';
		//echo '<h3>'.$val1.'</h3>';
		if(strlen($val1)<10) $val1=null;
		//echo '<br/>' . \Carbon\Carbon::createFromFormat('Y-m-d',$val)->formatLocalized('%d/%m/%Y');
		//echo '<br/>'.$value;
		//echo '<br/>'.\Carbon\Carbon::createFromFormat('Y-m-d H:i:s','2017-01-01 13:23:22');
		// il form :: non date time ma text
		@endphp
		<div class="datepicker-input input-group date">
		{{ Form::text($name, $val1, array_merge(['class' => 'form-control daterange'], $attributes)) }}
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

{{	Theme::addStyle('/theme/bc/bootstrap-daterangepicker/daterangepicker.css') }}

{{  Theme::addScript('/theme/bc/jquery/dist/jquery.min.js') }}
{{--	Theme::addScript('/theme/bc/moment/min/moment.min.js') --}}
{{--	Theme::addScript('/theme/bc/bootstrap-daterangepicker/daterangepicker.js') --}}
{{  Theme::addScript('/theme/js/bsDateRange.js') }}

{{-- 
https://gist.github.com/brunoti/53bd7b3501e3626a9baa
 --}}