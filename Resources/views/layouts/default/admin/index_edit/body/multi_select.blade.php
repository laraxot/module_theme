@php
	//ddd($_layout);
	//ddd($_panel);
	//$last_item=last($items);
	//$last_container=last($containers);
    //$types=Str::camel(Str::plural($last_container));
    //dddx($items);
    //dddx(get_defined_vars());
    $last_item_panel=Panel::get($last_item);
    $_panel->setParent($last_item_panel);
    //dddx($_panel->url(['act'=>'index_edit']));
    //dddx($_panel->url(['act'=>'index_edit']));
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
