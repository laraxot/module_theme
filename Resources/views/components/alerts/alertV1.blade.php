{{-- https://github.com/dgvai/laravel-adminlte-components/blob/master/src/resources/components/alert.blade.php --}}
<div {{ $attributes->merge($attrs) }}>
    @if ($dismissable)
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @endif

    <h5><i class="icon fas fa-{{ $icon }}"></i> {{ $title }}</h5>
    {{ $slot }}
</div>
