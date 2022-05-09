@props(['for'])

{{-- @error($for)
    <span {{ $attributes->merge(['class' => 'invalid-feedback']) }} role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror --}}

@if ($errors->has($for))
    <span {{ $attributes->merge(['class' => 'invalid-feedback']) }} role="alert">
        <b>{{ $errors->first($for) }}</b>
    </span>
@endif
