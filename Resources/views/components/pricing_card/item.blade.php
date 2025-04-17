@php
$check_class = '';
if ($attrs['checked'] == true) {
    $check_class = 'fas-check';
} else {
    $check_class = 'fas-times';
}
@endphp

<li id="{{ $attrs['id'] }}" class="mb-3"><span class="fa-li text-primary"><i
            class="fas {{ $check_class }}"></i></span>{{ $slot }}
</li>
