@php

//{!! Form::bsBtnCreate(['txt'=>__($item_view.'.btn.new')]) !!}
//$user=$item0;
//$types=camel_case(str_plural($container1));
//ddd($_layout->item_view);
@endphp
{!! Form::bsBtnCreate(['row'=>$row]) !!}
@foreach($rows as $key=>$row)
	@include($_layout->item_view,['key'=>$key,'row'=>$row])
@endforeach
{{ $rows->links() }}

{{--
{!! Form::bsOpen($user,'index_edit','index_edit') !!}
{{ Form::bsMultiCheckbox($types) }}
{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
--}}

{!! Form::close() !!}
