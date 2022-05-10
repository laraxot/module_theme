{{-- classe random di 30 caratteri --}}

@php
$modal_id = Str::random(30);

@endphp
<a style="color:{{ $color }}" href="#" wire:click="showModal('{{ $modal_id }}')">{{ $title }}</a>

@push('modals')
    <livewire:modal.body-view id="{{ $modal_id }}" popup_button="{{ $popup_button }}" title="{{ $title }}"
        bodyView="{{ $view . '.form' }}" />
@endpush
