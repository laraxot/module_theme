@props([
    'shape' => 'circle', // circle or square
    'size' => 40,

    // works only with source type boringAvatars
    'variant' => 'beam', // marble, beam, pixel, sunset, bauhaus, ring
    'colors' => ['5e9fa3', 'dcd1b4', 'fab87f', 'f87e7b', 'b05574'],

    'name' => 'Tony Stark',

    'source' => 'dicebearAvatars', // boringAvatars or dicebearAvatars
])

@php
$avatarShapeClass = [
    'rounded' => 'rounded-lg',
    'square' => 'rounded-lg',
    'circle' => 'rounded-full',
][$shape];
@endphp

<div class="inline-flex flex-shrink-0 overflow-hidden bg-gray-100 {{ $avatarShapeClass }}"
    style="width: {{ $size }}px; height: {{ $size }}px;">

    @if ($source === 'dicebearAvatars')
        <img src="https://avatars.dicebear.com/api/initials/{{ urlencode($name) }}.svg?&width={{ $size }}&height={{ $size }}"
            alt="{{ $name }}" title="{{ $name }}" class="object-fit" loading="lazy" />
    @else
        <img src="https://source.boringavatars.com/{{ $variant }}/{{ $size }}/{{ urlencode($name) }}?colors={{ implode(',', $colors) }}&{{ $shape }}"
            alt="{{ $name }}" title="{{ $name }}" class="object-fit" loading="lazy" />
    @endif

</div>

{{-- https://devdojo.com/mithicher/5-reusable-laravel-blade-components-with-alpinejs
<x-avatar name="Loki" size="128" source="boringAvatars" /> --}}
