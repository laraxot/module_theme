@php
//https://italia.github.io/bootstrap-italia/docs/form/input/#utilizzo-di-placeholder-e-label
/*
    <div class="form-group">
        <label for="formGroupExampleInput2">Etichetta di esempio</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Testo di esempio">
    </div>
    */

/*
    <x-formx::input
        type="text"
        name="text_input"
        label="text_label"
        class="form-control"
        id="formGroupExampleInput2"
        value=""
        placeholder="Testo di esempio"
        />
    */
@endphp
@component($input_component)
    @slot('label')
        <label>
            {{ $label }}
        </label>
    @endslot
    @slot('input')
        <input type="text" {{ $attributes->merge($attrs) }} />
    @endslot
@endcomponent
