@php
//dddx($_panel);
@endphp
@extends('adm_theme::layouts.app')
@section('content')
    @if (is_array($_panel->indexNav()))
        @include('adm_theme::layouts.partials.nav',['nav'=>$_panel->indexNav()])
    @else
        {!! $_panel->indexNav() !!}
    @endif
    {{-- {!! Theme::include('inner_page', [], get_defined_vars()) !!} --}}
    {{-- {!!  Theme::include('tabs', ['tabs' => $_panel->getTabs()], get_defined_vars()) !!} --}}
    @component('theme::components.crud', get_defined_vars())
        @slot('content')
            {!! Theme::include('topbar', [], get_defined_vars()) !!}
            @foreach ($rows as $row)
                @php
                    $fields = $_panel->indexFields();
                    /*
                                                                $row_panel=Panel::get($row);
                                                                $row_panel->setParent($_panel->getParent());
                                                            */
                    $row_panel = $_panel->getHydrate($row);
                    $row_panel->setName($_panel_name);
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
                                @if ($row_panel->itemActions()->count() > 5)
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-tools"></i>
                                        </button>
                                        <div class="dropdown-menu">
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
                        {!! $row_panel->btnCrud() !!}
                    </td>
                </tr>
                @if ($loop->last)
                    </tbody>
                    </table>
                @endif
            @endforeach
            @if (view()->exists('adm_theme::layouts.partials.pagination'))
                {{ $rows->appends(request()->query())->links('adm_theme::layouts.partials.pagination') }}
            @else
                {{ $rows->appends(request()->query())->links() }}
            @endif
        @endslot
    @endcomponent
@endsection
{{-- @include('theme::layouts.default.admin.common.action') --}}
