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
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-light">
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
                                @if($row_panel->itemActions()->count()>5)
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-tools"></i>
                                    </button>
                                    <div class="dropdown-menu" >
                                        @foreach ($row_panel->itemActions() as $act)
                                            {!! $act->btnHtml() !!}
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                    @foreach ($row_panel->itemActions() as $act)
                                        {!! $act->btnHtml() !!}
                                    @endforeach
                                @endif
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
