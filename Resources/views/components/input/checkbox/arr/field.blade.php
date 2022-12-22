<div class="form-check">
    {{-- dddx([get_defined_vars(),$attributes->merge($attrs)]) --}}
    @foreach ($options as $key => $option)
        @php
            // dddx([$key, $option]);
            $attrs['wire:model.lazy'] = 'form_data.' . $name . '.' . $key;
        @endphp
        <input type="checkbox" {{ $attributes->merge($attrs) }} value="{{ $key }}">
        <label for="{{ $attrs['name'] }}"> {{ $option }}</label><br>
    @endforeach


</div>
