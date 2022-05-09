@extends('pub_theme::layouts.app')
@section('content')
    @include($view.'.head')

    @livewire('theme::full_calendar')
@endsection
