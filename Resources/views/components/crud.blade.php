@php
$acts = ['index', 'create', 'edit'];
if (
    Str::endsWith(
        request()
            ->route()
            ->getName(),
        'index_edit',
    )
) {
    $acts = ['indexEdit', 'create', 'edit'];
}
@endphp
<div class="content">
    <div class="clearfix"></div>
    @include('formx::includes.flash')
    <div class="card">
        <div class="card-header">

            <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                {{-- request()->route()->getName()
                    admin.container0.edit --}}

                @foreach ($acts as $v_act)
                    @can($v_act, $_panel)
                        @php
                            $href = $_panel->url(['act' => $v_act]);
                            $href1 = Str::before($href, '?');
                            $req_path = '/' . request()->path();
                            $active = $href1 == $req_path;
                        @endphp
                        @if (!Str::startsWith($href, '#'))
                            <li class="nav-item">
                                <a class="nav-link {{ $active ? 'active' : '' }}" href="{{ $href }}">
                                    @if (inAdmin())
                                        {!! trans('adm_theme::icons.' . $v_act) !!}
                                    @else
                                        {!! trans('pub_theme::icons.' . $v_act) !!}
                                    @endif
                                    {{ trans($trad_mod . '.tab.' . $v_act) }}
                                </a>
                            </li>
                        @else
                            {{-- [url malformed {{ $v_act }}] --}}
                        @endif
                        {{-- [not can {{ $v_act }}] --}}
                    @endcan
                @endforeach
            </ul>

            <br />
            <ul class="nav nav-tabs align-items-end card-header-tabs w-100">

                @foreach ($_panel->getTabs() as $level)
                    <ul class="nav align-items-end card-header-tabs w-100">
                        @foreach ($level as $tab)
                            <li class="nav-item ">
                                <a class="nav-link {{ $tab->active ? 'active' : '' }}" href="{{ $tab->url }}">
                                    {{-- trans('theme::txt.' . $tab->title) --}}
                                    {{ $tab->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach

            </ul>

        </div>
        <div class="card-body">
            {{ $content }}
            <div class="clearfix"></div>
        </div>
    </div>
</div>
