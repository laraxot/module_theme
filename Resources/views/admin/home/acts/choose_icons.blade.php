@extends('adm_theme::layouts.app')

@section('content')

    <form action="{{ request()->fullUrl() }}" method="POST">
        @csrf
        @method('put')

        @foreach ($icons as $key => $sub)

            @if (is_iterable($sub))

                <h3>{{ $key }}</h3>

                @foreach ($sub as $k => $v)
                    <span>{{ $k }} => {{ $v }}</span>

                    <x-theme::input :name="$key.'['.$k.']'" type="text" :value="$v" />
                @endforeach
            @endif


        @endforeach
        <x-theme::input type="submit" value="Submit" name="submit" />
    </form>
@endsection
