@component($input_component)
    @slot('label')
        <label>
            {{ $label }}
        </label>
    @endslot
    @slot('input')
        <input type="submit" {{ $attributes->merge($attrs) }} />
    @endslot
@endcomponent
