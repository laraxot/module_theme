<select {{ $attributes->merge($attrs) }}>
    <option value="">---</option>
    @foreach ($options as $k => $v)
        <option value="{{ $k }}" {!! $k == $value ? 'selected' : '' !!}>
            {{ $v }}
        </option>
    @endforeach
</select>
