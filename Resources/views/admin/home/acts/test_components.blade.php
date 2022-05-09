@extends('adm_theme::layouts.app')
@section('content')
    <x-navbar>
          
        @foreach($tests as $k=>$v)
            <x-navbar.item href="{!! Request::fullUrlWithQuery(['i' => $k]) !!}"
                active="{{ $v->active }}">
                {{ $v->name }}
            </x-navbar.item>
        @endforeach
        
    </x-navbar>
    @if(isset($test))
    <x-col size="12">
        {{ $test->name }}
        <x-dynamic
            :component="$test->name" 
            :attrs="$test->attrs"
        >
            {{ $test->text }}
        </x-dynamic>
    </x-col>
    @endif
@endsection