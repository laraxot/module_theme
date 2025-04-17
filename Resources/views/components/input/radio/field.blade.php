{{-- <input type="radio" {{ $attributes->merge($attrs) }} /> --}}
{{--
https://github.com/italia/design-comuni-pagine-statiche/blob/main/src/components/radio/radio.hbs
--}}
{{-- {{ dddx($attributes->merge($attrs)) }} --}}
{{-- {{ dddx(['attrs' => $attrs, 'attributes' => $attributes]) }} --}}
{{-- {{ dddx(get_defined_vars()) }} --}}
{{-- {{ dddx($options) }} --}}
{{-- {{ dddx($attrs['name']) }} --}}
<div class="form-check">
    @foreach ($options as $key => $option)
        <input type="radio" {{ $attributes->merge($attrs) }} value="{{ $key }}">
        <label for="{{ $attrs['name'] }}">{{ $option }}</label>
        <br>
    @endforeach
</div>
