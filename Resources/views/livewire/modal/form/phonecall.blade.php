{{-- classe random di 30 caratteri --}}

@php
$modal_id = Str::random(30);

@endphp
<a style="color:{{ $color }}" href="#" wire:click="showModal('{{ $modal_id }}')">{{ $title }}</a>

@push('modals')
<<<<<<< HEAD
    <livewire:modal.body-view id="{{ $modal_id }}" popup_button="{{ $popup_button }}" title="{{ $title }}"
=======
    <livewire:theme::modal.body-view id="{{ $modal_id }}" popup_title="{{ $popup_title }}"
        popup_subtitle="{{ $popup_subtitle }}" popup_button="{{ $popup_button }}" title="{{ $title }}"
>>>>>>> ede0df7 (first)
        bodyView="{{ $view . '.form' }}" />
@endpush
