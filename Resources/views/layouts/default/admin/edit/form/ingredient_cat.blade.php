{!! Form::bsOpen($row,'update') !!}
{{ Form::bsText('title') }}
{{ Form::bsText('subtitle') }}
{{Form::bs3Submit('Aggiungi')}}
{!! Form::close() !!}