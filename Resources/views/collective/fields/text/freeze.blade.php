@php
    $out=$field->value;

    if(is_array($field->value)){
<<<<<<< HEAD
        $out='<pre>'.print_r($field->value,true).'</pre>';
=======
        $out='Array ??';
>>>>>>> ede0df7 (first)
    }else{

    }
@endphp
<<<<<<< HEAD
{!! $out !!}
=======
{{ $out }}
>>>>>>> ede0df7 (first)
