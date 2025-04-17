@extends('adm_theme::layouts.app')
@section('content')
    <x-navbar>
        @foreach ($players as $k => $v)
            <x-navbar.item href="{!! Request::fullUrlWithQuery(['i' => $k]) !!}"
                active="{{ $player == $v ? 'active' : '' }}">
                {{ $v }}
            </x-navbar.item>
        @endforeach
    </x-navbar>


    <x-col size="3">
        <x-video-player :player="$player" :mp4Src="$mp4_src"></x-video-player>
    </x-col>
@endsection
