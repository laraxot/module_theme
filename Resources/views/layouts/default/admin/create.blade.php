@extends('adm_theme::layouts.app')
@php
$last_container = last($containers);
if (!is_object($row)) {
    return '';
}
$fields = $_panel->editFields();
@endphp
@section('content')
    @component('theme::components.crud', get_defined_vars())
        @slot('content')
            <x-theme::alerts.error :errors="$errors" />
            {!! Form::bsOpenPanel($_panel, 'store') !!}
            <div class="row">
                @foreach ($fields as $field)
                    {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
                @endforeach
            </div>
            {{ Form::bsSubmit('Salva') }}
            {!! Form::close() !!}
        @endslot
    @endcomponent
@endsection
