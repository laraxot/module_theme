@component($input_component)
    @slot('label')
        <label>
            {{ $label }}
        </label>
    @endslot
    @slot('input')
        <select {{ $attributes->merge($attrs) }}>
        @foreach ($props['options'] as $k=>$v)
            <option value="{{ $k }}" >
                {{ $v }}
            </option>
        @endforeach
        </select>
    @endslot
@endcomponent


