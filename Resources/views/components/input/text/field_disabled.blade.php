@php
    //https://italia.github.io/bootstrap-italia/docs/form/input/#disabilitato
    /*
    <div class="form-group">
        <input class="form-control" type="text" id="input-text-disabled" disabled>
        <label for="input-text-disabled">Contenuto disabilitato</label>
    </div>
    */

    /*esempio utilizzo
    <x-theme::input
        type="text_disabled"
        name="input-text-disabled"
        label="input-text-disabled"
        class="form-control"
        id="input-text-disabled"
        value="contenuto disabilitato"
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
        <input type="text" {{ $attributes }} disabled/>
    @endslot
@endcomponent
