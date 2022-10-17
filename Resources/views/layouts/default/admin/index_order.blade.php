@extends('adm_theme::layouts.app')
@section('content')



    @if (isset($params['module']))
        {{-- che tanto mi sa che si usa sempre IndexOrder di ewb a prescindere dal modulo --}}
<<<<<<< HEAD
        @livewire('crud.index_order', ['rows' => $rows])
    @else
        @livewire('crud.index_order', ['rows' => $rows])
=======
        @livewire('ewb::crud.index_order', ['rows' => $rows])
    @else
        @livewire('theme::crud.index_order', ['rows' => $rows])
>>>>>>> ede0df7 (first)
    @endif

@endsection
