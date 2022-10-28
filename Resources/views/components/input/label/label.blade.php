@props([
    'label' => null,
    'name' => 'no-name',
    'id' => null,
])
<label for="{{ $id }}">{{ $label ?? trans($tradKey . '.' . $name . '.label') }}</label>
