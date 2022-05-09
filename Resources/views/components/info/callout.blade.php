{{-- https://github.com/dgvai/laravel-adminlte-components/blob/master/src/resources/components/callout.blade.php --}}
<div {{ $attributes->merge($attrs) }}>
    @if (!is_null($title))
        <h5>{{ $title }}</h5>
    @endif
    <p>{{ $slot }}</p>
</div>
