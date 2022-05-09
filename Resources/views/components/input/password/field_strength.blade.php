@php
    //https://italia.github.io/bootstrap-italia/docs/form/input/#input-password


    /*esempio di utilizzo
        <x-theme::input 
        type="password" 
        name="password_strength" 
        label="password_strength" 
        class="form-control input-password input-password-strength-meter" 
        id="exampleInputPassword3"
        data-enter-pass="Puoi usare un testo di aiuto personalizzato"
        />
    */

    Theme::add($comp_ns.'/css/forms.scss');
    Theme::add($comp_ns.'/css/form-password.scss');
    Theme::add($comp_ns.'/js/password-strength-meter.js');
@endphp
@component($input_component)
    @slot('label')
        <label>
            {{ $label }}
        </label>
    @endslot
    @slot('input')
        {{-- 
            <input type="password" class="form-control input-password input-password-strength-meter" 
            data-enter-pass="Puoi usare un testo di aiuto personalizzato" id="exampleInputPassword3">
        --}}
        <input type="password" {{ $attributes }} />
        <span class="password-icon" aria-hidden="true">
            <svg class="password-icon-visible icon icon-sm">
                {{-- <usexlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-password-visible"></use> --}}
                <use xlink:href="{{ Theme::asset($comp_ns.'/svg/it-password-visible.svg') }}"></use>
            </svg>
            <svg class="password-icon-invisible icon icon-sm d-none">
                {{-- <usexlink:href="/bootstrap-italia/dist/svg/sprite.svg#it-password-invisible"></use> --}}
                <use xlink:href="{{ Theme::asset($comp_ns.'/svg/it-password-invisible.svg') }}"></use>
            </svg>
        </span>
    @endslot
@endcomponent
