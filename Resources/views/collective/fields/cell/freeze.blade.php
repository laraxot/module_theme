@php
foreach ($field->fields as $k => $v) {
    //try{
    echo Theme::inputFreeze(['row' => $row, 'field' => $v]);
    echo '  ';
    //}catch(\Exception $e){
    //	dddx($e);
    //}
}
@endphp
