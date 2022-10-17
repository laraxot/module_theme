@php
//dddx();
$label = '---';
try {
    $obj = $row->{$field->relationship};
    $panel = Panel::make()->get($obj);
    $label = $panel->optionLabel($obj);
} catch (\Exception $e) {
}
//$label=$opts->title;
/*
 if(isset($opts[$field->value])){
  $label=$opts[$field->value];
 }else{
<<<<<<< HEAD

=======
  
>>>>>>> ede0df7 (first)
 }
 */
//$label=isset($opts[$field->value])?'SI':'NO';
//{{ $field->value }}]
@endphp
{{ $label }}
