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
            {!! Theme::include('topbar', [], get_defined_vars()) !!}
            <x-theme::alerts.error :errors="$errors" />

            {!! Form::bsOpenPanel($_panel, 'create') !!}

            <div class="row">
                @foreach ($fields as $field)
                    {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
                @endforeach
            </div>
            {{ Form::bsSubmit('Crea') }}
            {!! Form::close() !!}
            {{-- </x-theme::forms.panel> --}}
        @endslot
    @endcomponent
@endsection
