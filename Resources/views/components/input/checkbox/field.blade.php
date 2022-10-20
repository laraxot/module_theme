{{-- dddx(['attrs'=>$attrs,'attributes'=>$attributes]) --}}
<input type="checkbox" {{ $attributes->merge($attrs) }} />
{{-- <input class="form-check-input" id="loginRemember" type="checkbox" /> --}}
