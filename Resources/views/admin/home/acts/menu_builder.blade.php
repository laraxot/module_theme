@extends('adm_theme::layouts.app')

@section('content')
<<<<<<< HEAD
    <livewire:menu.builder />
@endsection
=======
    {{--  
    {!! Menu::render() !!}
    --}}
    <livewire:theme::menu.builder />
@endsection


@push('scripts')
    {{--  
    {!! Menu::scripts() !!}
    --}}
@endpush
>>>>>>> ede0df7 (first)
