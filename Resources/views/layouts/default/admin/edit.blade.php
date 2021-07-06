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
            {{-- {!! Theme::include('tabs',['tabs'=>$_panel->getTabs()],get_defined_vars()) !!}
            <x-theme::forms.panel :panel="$_panel" action="update">
            --}}
            {!! Form::bsOpenPanel($_panel, 'update') !!}

            <div class="row">
            @foreach ($fields as $field)
                {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
            @endforeach
            </div>
            {{ Form::bsSubmit('Modifica') }}
            {!! Form::close() !!}
            {{--
            </x-theme::forms.panel>
            --}}
        @endslot
    @endcomponent
@endsection
