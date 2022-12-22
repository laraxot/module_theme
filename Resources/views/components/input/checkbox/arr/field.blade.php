@props([
    'options' => [],
    'arr' => [],
    'value' => null,
])

@php
    if (!Arr::isAssoc($options)) {
        $options = array_combine($options, $options);
    }
    if (is_string($value)) {
        $value = htmlspecialchars_decode($value);
    }
    if (isJson($value)) {
        $value = json_decode($value);
    }
@endphp

<div class="form-check">
    @foreach ($options as $key => $option)
        <input type="checkbox" {{ $attributes->merge($attrs) }} value="{{ $key }}"
            @if (\array_search($option, $value) !== false) checked @endif)>
        <label for="{{ $attrs['name'] }}"> {{ $option }}</label><br>
    @endforeach
</div>
