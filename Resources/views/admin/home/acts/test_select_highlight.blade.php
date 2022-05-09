@extends('adm_theme::layouts.app')
@section('content')
    <x-navbar>
        @foreach ($drivers as $k => $v)
            <x-navbar.item href="{!! Request::fullUrlWithQuery(['i' => $k]) !!}"
                active="{{ $driver == $v ? 'active' : '' }}">
                {{ $v }}
            </x-navbar.item>
        @endforeach
    </x-navbar>


    @php
    //dddx([$content_selection_and_highlighting, $txt]);
    @endphp

    <x-col size="12">
        <x-selection-highlight :driver="$driver" :txt="$txt">
            </x-selection-highligh>
    </x-col>
@endsection
