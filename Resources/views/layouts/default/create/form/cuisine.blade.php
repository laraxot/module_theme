{!! Form::bsOpen($row,'store') !!}
<<<<<<< HEAD

=======
 
>>>>>>> ede0df7 (first)
{{ Form::bsTwitterTypeahead('title',null,['data-href'=>$row->url.'?q=%QUERY%']) }}
{{--
{{ Form::bsJqueryuiAutocomplete('title',null,['data-href'=>$row->url.'?q=%QUERY%']) }}

{{ Form::bsLeaverouAwesomplete('title',null,['data-href'=>$row->url.'?q=%QUERY%']) }}
{{ Form::bsAutocompletePopover('title1',null,['data-href'=>$row->url.'?q=%QUERY%']) }}
--}}


{{ Form::bsText('subtitle') }}
{{--
{!! Form::bsTextarea('txt') !!}
--}}
{{ Form::bsUnisharpImg('image_src') }}
{{Form::bsSubmit('Aggiungi')}}
{!! Form::close() !!}