@php
$src= $field->value ;
if(Str::startsWith($src,'chart')){
    $src=asset($src);
}

@endphp
<img src="{{ $src }}" width="100" height="100" />