@extends('adm_theme::layouts.app')

@section('content')
    {{-- {!! Menu::render() !!} --}}
    <livewire:menu.builder />
@endsection


@push('scripts')
    {{-- {!! Menu::scripts() !!} --}}
@endpush
