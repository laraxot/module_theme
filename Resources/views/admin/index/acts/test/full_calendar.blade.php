@extends('pub_theme::layouts.app')
@section('content')
    @include($view.'.head')

    @livewire('full_calendar')
@endsection
