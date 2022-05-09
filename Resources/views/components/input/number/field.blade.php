@php
//https://italia.github.io/bootstrap-italia/docs/form/input-numerico/#esempi

/*
    <div class="w-100">
        <label for="inputNumber" class="input-number-label">Input Number inserito in una colonna a tutta larghezza</label>
        <span class="input-number">
            <input type="number" id="inputNumber" name="inputNumber" value="100">
            <button class="input-number-add">
            <span class="sr-only">Aumenta valore</span>
            </button>
            <button class="input-number-sub">
            <span class="sr-only">Diminuisci valore</span>
            </button>
        </span>
    </div>
    */
Theme::add($comp_ns . '/css/forms.scss');
Theme::add($comp_ns . '/css/form-input-number.scss');
Theme::add($comp_ns . '/css/screen_reader.scss');
Theme::add($comp_ns . '/js/input-number.js');
@endphp

@component($input_component)
    @slot('label')
        <label>
            {{ $label }}
        </label>
    @endslot
    @slot('input')
        <div class="w-50">
            <span class="input-number">
                <input type="number" {{ $attributes->merge($attrs) }}>
                <button class="input-number-add">
                    <span class="sr-only">Aumenta valore</span>
                </button>
                <button class="input-number-sub">
                    <span class="sr-only">Diminuisci valore</span>
                </button>
            </span>
        </div>
    @endslot
@endcomponent
