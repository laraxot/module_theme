<div class="form-check">
    @foreach ($options as $key => $option)
        <input type="radio" {{ $attributes->merge($attrs) }} value="{{ $key }}">
        <label class="form-check-label" for="{{ $attrs['name'] }}">{{ $option }}</label>
        <br>
    @endforeach
</div>
