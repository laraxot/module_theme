@extends('adm_theme::layouts.app')
@section('content')
    @php
    $last_item=last($items);
    $last_container=last($containers);
    $types=Str::camel(Str::plural($last_container));
    $field=(object)[
    'name'=>'areas',
    'type'=>'PivotFields',
    ];
    @endphp


    @foreach ($rows as $key => $row)
        @php
        $fields=$_panel->indexFields();
        //$row_panel=$_panel;
        $row_panel=Panel::get($row);
        $row_panel->setParent($_panel->getParent());
        //dddx([$_panel,$row_panel]);

        @endphp
        @if ($loop->first)
            <table>
                <thead>
                    <tr>
                        @foreach ($fields as $field)
                            <td>{{ str_replace('_', ' ', $field->name) }}</td>
                        @endforeach
                        <td></td>
                    </tr>
                </thead>
                <tbody>
        @endif
        <tr>
            @foreach ($fields as $field)
                <td>
                    {!! Theme::inputFreeze(['row' => $row, 'field' => $field]) !!}

                    @if ($loop->first)
                        @foreach ($row_panel->itemActions() as $act)
                            {!! $act->btnHtml() !!}
                        @endforeach
                    @endif
                </td>
            @endforeach
            <td>
                {!! $row_panel->btnCrud() !!}
            </td>
        </tr>
        @if ($loop->last)
            </tbody>
            </table>
        @endif

    @endforeach
    {{ $rows->links() }}

    {{--
    {{ Form::submit('Salva ed esci', ['class' => 'submit btn btn-success green-meadow']) }}
    {!! Theme::inputHtml(['row' => $last_item, 'field' => $field]) !!}
    /*escaped*/{!!
    ?>Form::bsOpen($last_item, 'index_edit', 'index_edit') !!}
    {{ Form::bsMultiCheckbox($types) }}
    /*escaped*/{!!
    ?>Form::close() !!}
    --}}

@endsection
