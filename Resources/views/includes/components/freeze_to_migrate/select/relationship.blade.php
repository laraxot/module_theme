@php
//dddx();
$opts = $row->{$field->relationship}();
if (isset($opts[$field->value])) {
    $label = $opts[$field->value];
} else {
    $label = '---';
}
//$label=isset($opts[$field->value])?'SI':'NO';
//{{ $field->value }}]
@endphp
{{ $label }}
