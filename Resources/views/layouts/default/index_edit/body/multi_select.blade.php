@php

//{!! Form::bsBtnCreate(['txt'=>__($item_view.'.btn.new')]) !!}
//ddd($second_last);
//$user=$item0;
$last_container=last($containers);
$types=Str::camel(Str::plural($last_container));
$last_item=last($items);

//ddd(get_class($_panel));
@endphp

{!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
{{ Form::bsMultiSelect2Sides($types) }}
{{-- Form::bsMultiRating($types) --}}
{{ Form::bsSubmit('Salva') }}
{!! Form::close() !!}