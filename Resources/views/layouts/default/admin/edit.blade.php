@extends('adm_theme::layouts.app')
@section('content')
    @php
    //ddd($item_view);
    /*
    ddd($item_view);
    if(!\View::exists($view.'.form') && !\View::exists($view_default.'.form.'.$edit_type) ) {
    ddd('non esiste ne ['.$view.'.form'.'] ne ['.$view_default.'.form.'.$edit_type.']');
    }
    */
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
            $fields=$_panel->editFields();
            //dddx(get_defined_vars());
            //dddx($_panel);
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
