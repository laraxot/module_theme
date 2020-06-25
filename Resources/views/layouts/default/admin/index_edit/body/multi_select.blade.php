@php
	//ddd($_layout);
	//ddd($_panel);
	//$last_item=last($items);
	//$last_container=last($containers);
	//$types=Str::camel(Str::plural($last_container));
@endphp
{!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
{{ Form::bsMultiCheckbox($types) }}
{!! Form::bsSubmit('save') !!}
{!! Form::close() !!}