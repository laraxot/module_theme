@php
    if(!view()->exists('pub_theme::layouts.app')){
        dddx([
            'err'=>'not exists',
            'blade'=>'pub_theme::layouts.app',
            'pub_theme'=>config('xra.pub_theme'),
            'hints'=>View::getFinder()->getHints(),
        ]);
    }
@endphp
@extends('pub_theme::layouts.app')
@section('content')
    @php
    $fields=$_panel->fields();
    //ddd(get_class($row));
    @endphp
    <table>

        @foreach ($fields as $k => $v)
            <tr>
                <td>{{ $v->name }}</td>

                <td> {{ $row->{$v->name} }}</td>
            </tr>
        @endforeach
    </table>
@endsection
{{-- @include('theme::layouts.default.common.action') --}}
