@props([
    'name',
    'options'=>[],
    'value'=>null,
])
<select {{ $attributes->merge($attrs) }}>
    <option value="">---</option>
    @if(isset($options))
        @foreach ($options as $k => $v)
            <option value="{{ $k }}" {!! $k == $value ? 'selected' : '' !!}>
                {{ $v }}
            </option>
        @endforeach 
    @endif
</select>