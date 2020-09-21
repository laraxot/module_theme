@extends('adm_theme::layouts.app')
@section('content')
    @if (is_array($_panel->indexNav()))
        @include('adm_theme::layouts.partials.nav',['nav'=>$_panel->indexNav()])
    @else
        {!! $_panel->indexNav() !!}
    @endif


    <div class="row">
        <div class="col" style="overflow:auto">
            @foreach ($rows as $row)
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
                        {{--
                        {!! Form::bsBtnCrud(['row' => $row]) !!}
                        --}}
                        {!! $row_panel->btnCrud() !!}
                    </td>
                </tr>
                @if ($loop->last)
                    </tbody>
                    </table>
                @endif

            @endforeach
            {{ $rows->appends(request()->query())->links() }}
        </div>
    </div>

@endsection
{{--
@include('theme::layouts.default.admin.common.action')
--}}
