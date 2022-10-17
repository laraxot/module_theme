{!! Form::bsOpen($row,'store') !!}
{{ Form::bsText('title') }}
{{ Form::bsText('subtitle') }}
<<<<<<< HEAD
{{--
=======
{{-- 
>>>>>>> ede0df7 (first)
{!! Form::bsTextarea('txt') !!}
{{ Form::bsUnisharpImg('image_src') }}
--}}
{{ Form::bsNumber('pivot[price]') }}
{{Form::bsSubmit('Aggiungi')}}
{!! Form::close() !!}