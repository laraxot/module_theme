@php
/*
foreach ($field->fields as $k => $v) {
    //try{
    echo '<div class="text-nowrap" style="border-bottom:1px darkgray;">';
    echo $v->label ?? $v->name;
    echo ' : ';
    echo Theme::inputFreeze(['row' => $row, 'field' => $v]);
    echo '</div>';
    //}catch(\Exception $e){
    //	dddx($e);
    //}
}
*/
@endphp
@foreach ($field->fields as $k => $v)
    <div style="border-bottom:1px darkgray;">
        <b>{{ $v->label ?? $v->name }}</b> : {{ Theme::inputFreeze(['row' => $row, 'field' => $v]) }}
    </div>
@endforeach
