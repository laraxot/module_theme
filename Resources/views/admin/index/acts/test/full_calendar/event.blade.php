@extends('pub_theme::layouts.app')
@section('content')
    @include($view.'.head')

    @livewire('theme::full_calendar.event',['model_class'=>'\Modules\Blog\Models\Event'])
@endsection
