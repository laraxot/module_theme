@foreach($field->fields as $k=>$v)
    {!! Theme::inputFreeze(['row'=>$row,'field'=>$v]) !!}<br/>
@endforeach