@php
$last_item=last($items);
$last_container=last($containers);
$types=Str::camel(Str::plural($last_container));
//{!! Form::bsBtnCreate(['txt'=>__($item_view.'.btn.new')]) !!}
//$user=$item0;
//$types=Str::camel(Str::plural($container1));
//ddd($_layout->item_view);
$field=(object)[
	'name'=>'areas',
	'type'=>'PivotFields',
];
@endphp

{!! Form::bsBtnCreate(['row'=>$row]) !!}
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}

{{--
{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Theme::inputHtml(['row'=>$last_item,'field'=>$field]) !!}
{!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
{{ Form::bsMultiCheckbox($types) }}
{!! Form::close() !!}
--}}

