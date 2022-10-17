@extends('pub_theme::layouts.app')
@section('content')
    @include($view.'.head')

<<<<<<< HEAD
    @livewire('full_calendar.event',['model_class'=>'\Modules\Blog\Models\Event'])
=======
    @livewire('theme::full_calendar.event',['model_class'=>'\Modules\Blog\Models\Event'])
>>>>>>> ede0df7 (first)
@endsection
