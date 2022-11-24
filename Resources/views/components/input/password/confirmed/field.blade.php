@php
    //_confirmation
@endphp
<input type="password" {{ $attributes->merge($attrs) }} />
@php
    $attrib1=$attributes
        ->merge(['name'=>$name.'_confirmation','wire:model.lazy'=>'form_data.'.$name.'_confirmation'])
        ->merge($attrs);
@endphp

<input type="password" name="{{$name}}_confirmation" {{ $attrib1 }} />