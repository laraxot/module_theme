@extends('adm_theme::layouts.app')
@php
    $last_container=last($containers);
@endphp

@section('content')
    @component('theme::components.crud',get_defined_vars())
        @slot('content')
            {!! Theme::include('topbar',[],get_defined_vars()) !!}
            {!! Theme::include('tabs',['tabs'=>$_panel->getTabs()],get_defined_vars()) !!}
            {{--
            @livewire('formx::edit',['model'=>$_panel->row])
            --}}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $k => $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @php
                if(!is_object($row)) return '';
                $fields=$_panel->editFields();
            @endphp
            {!! Form::bsOpenPanel($_panel, 'update') !!}
            @foreach ($fields as $field)
            {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
            @endforeach
            {{ Form::bsSubmit('Modifica') }}
            {!! Form::close() !!}
        @endslot
    @endcomponent
@endsection


{{--
@extends('adm_theme::layouts.app')
@section('content')

    <div class="widget">
        <div class="widget-body">

            @php
            if(!is_object($row)) return '';
            $fields=$_panel->editFields();
            //dddx(get_defined_vars());
            //dddx($fields);
            @endphp
            {!! Form::bsOpenPanel($_panel, 'update') !!}
            <div class="row">
                @foreach ($fields as $field)
                    {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
                @endforeach
            </div>

            {{ Form::bsSubmit('Modifica') }}
            {!! Form::close() !!}

        </div>
    </div>
@endsection
--}}
