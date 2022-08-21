<div class="content">
    <div class="clearfix"></div>
    @include('theme::includes.flash')
    <div class="card">
        <div class="card-header">

            <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                @foreach ($_panel->getCrudActions() as $act)
                    <li class="nav-item">
                        <a class="nav-link {{ $act->active ? 'active' : '' }}" href="{{ $act->url }}">
                            {{ $act->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-header">
            <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                <li class="nav-item ">
                    <a class="nav-link {{-- $tab->active?'active':'' --}}" href="{{ $_panel->getBreads()->first()->url('edit') }}">
                        {{ $_panel->getBreads()->first()->title() }}
                    </a>
                </li>
                @foreach ($_panel->getTabs() as $level)
                    @foreach ($level as $tab)
                        <li class="nav-item ">
                            <a class="nav-link {{ $tab->active ? 'active' : '' }}" href="{{ $tab->url }}">
                                {{ $tab->title }}
                            </a>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>

        <div class="card-body">
            {{ $content }}
            <div class="clearfix"></div>
        </div>
    </div>
</div>
