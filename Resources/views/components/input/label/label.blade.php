@props([
    'label'=>null,
    'name'=>'no-name',
])
<label for="{{ $name }}">{{ $label ?? trans($tradKey.'.'.$name.'.label') }}</label>
