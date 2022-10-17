@extends('adm_theme::layouts.app')
@section('content')
    <x-navbar>
<<<<<<< HEAD

=======
          
>>>>>>> ede0df7 (first)
        @foreach($tests as $k=>$v)
            <x-navbar.item href="{!! Request::fullUrlWithQuery(['i' => $k]) !!}"
                active="{{ $v->active }}">
                {{ $v->name }}
            </x-navbar.item>
        @endforeach
<<<<<<< HEAD

=======
        
>>>>>>> ede0df7 (first)
    </x-navbar>
    @if(isset($test))
    <x-col size="12">
        {{ $test->name }}
        <x-dynamic
<<<<<<< HEAD
            :component="$test->name"
=======
            :component="$test->name" 
>>>>>>> ede0df7 (first)
            :attrs="$test->attrs"
        >
            {{ $test->text }}
        </x-dynamic>
    </x-col>
    @endif
@endsection