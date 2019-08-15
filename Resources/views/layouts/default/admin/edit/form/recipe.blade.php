{!! Form::bsOpen($row,'update') !!}
{{ Form::bsText('title') }}
{{ Form::bsText('subtitle') }}
{{ Form::bsText('pivot[price]') }}
{!! Form::bsTextarea('txt') !!}
{{ Form::bsUnisharpImg('image_src') }}
{{Form::bs3Submit('Modifica')}}
{!! Form::close() !!}