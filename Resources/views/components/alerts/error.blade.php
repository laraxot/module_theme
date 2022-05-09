{{-- count(): Parameter must be an array or an object that implements Countable --}}
@php
/*
if (is_string($errors)) {
    $errors = json_decode($errors);
}

if (is_array($errors)) {
    $errors = collect($errors);
}
*/
@endphp

{{-- @if ($errors->any())
    <x-theme::alerts.alert type="danger">
        <ul>
            @foreach ($errors->all() as $k => $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-theme::alerts.alert>
@endif --}}
