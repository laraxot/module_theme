@php

    $last_item_panel=Panel::get($last_item);
    $_panel->setParent($last_item_panel);

    $url=$_panel->url(['act'=>'index_edit']);
@endphp

    {{ Form::model($last_item,['url'=>$url]) }}
{{--
{!!  Form::bsOpenPanel($_panel,'index_edit','index_edit')  !!}
    {!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
--}}
{{ Form::bsMultiCheckbox($types) }}
{!! Form::bsSubmit('save') !!}
{!! Form::close() !!}
