@component($input_component)
    @slot('label')
        <label>
            {{ $label }}
        </label>
    @endslot
    @slot('input')
        <input type="tel" {{ $attributes }} />
    @endslot
@endcomponent
