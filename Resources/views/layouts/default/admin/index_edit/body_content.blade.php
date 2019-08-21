@php
<<<<<<< HEAD

=======
$last_item=last($items);
$last_container=last($containers);
$types=camel_case(str_plural($last_container));
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
//{!! Form::bsBtnCreate(['txt'=>__($item_view.'.btn.new')]) !!}
//$user=$item0;
//$types=camel_case(str_plural($container1));
//ddd($_layout->item_view);
<<<<<<< HEAD
@endphp
=======
$field=(object)[
	'name'=>'areas',
	'type'=>'PivotFields',
];
@endphp

>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
{!! Form::bsBtnCreate(['row'=>$row]) !!}
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}

{{--
<<<<<<< HEAD
{!! Form::bsOpen($user,'index_edit','index_edit') !!}
{{ Form::bsMultiCheckbox($types) }}
{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
--}}

{!! Form::close() !!}
=======
{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Theme::inputHtml(['row'=>$last_item,'field'=>$field]) !!}
{!! Form::bsOpen($last_item,'index_edit','index_edit') !!}
{{ Form::bsMultiCheckbox($types) }}
{!! Form::close() !!}
--}}

>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
