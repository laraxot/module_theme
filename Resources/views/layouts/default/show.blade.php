@extends('pub_theme::layouts.app')
@section('content')
    @php
        $fields = $_panel->fields();
    @endphp
    <table>

        @foreach ($fields as $k => $v)
            <tr>
                <td>{{ $v->name }}</td>
                <td>
                    {!! Theme::inputFreeze(['row' => $row, 'field' => $v]) !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
