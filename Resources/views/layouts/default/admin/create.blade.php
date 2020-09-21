@extends('adm_theme::layouts.app')
@section('content')
    @php
    //if(!\View::exists($view.'.form') && !\View::exists($view_default.'.form.'.$edit_type) ) {
    // ddd('non esiste ne ['.$view.'.form'.'] ne ['.$view_default.'.form.'.$edit_type.']');
    //}
    @endphp
    <div class="widget">
        <div class="widget-body">
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
            $fields=$_panel->createFields();
            @endphp
            {!! Form::bsOpenPanel($_panel, 'store') !!}
            <div class="row">
                @foreach ($fields as $field)
                    {!! Theme::inputHtml(['row' => $row, 'field' => $field]) !!}
                @endforeach
            </div>
            {{ Form::bsSubmit('Save') }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
