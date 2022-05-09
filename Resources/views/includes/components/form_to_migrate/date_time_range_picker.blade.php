{{ Form::bsText($name,$value,array_merge($attributes,['class'=>'form-control daterange'])) }}

{{ Theme::addScript('/theme/bc/jquery/dist/jquery.min.js') }}
{{ Theme::addScript('/theme/bc/bootstrap-daterangepicker/daterangepicker.js') }}
{{ Theme::addScript('/theme/bc/moment/min/moment.min.js') }}
{{ Theme::addScript('/theme/bc/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
{{-- Theme::addScript('/theme/js/datetimerangepickerX.js') --}}