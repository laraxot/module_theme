<li class="{{ $li_class ?? '' }}" {{ $li_attribute ?? '' }}>
    <span class="menu-link ">
        <span class="svg-icon menu-icon">
            {!! $icon !!}
        </span>
        {{-- perche' $node->row->treeLabel() e non $node->treeLabel() ??? --}}
        <span class="menu-text menu-toggle">{{ Panel::make()->get($node->row)->treeLabel() }}</span>

        @component('theme::components.dropdown.simple', [
            'btn_class' => 'btn btn-dark',
            'title' => '<i class="fas fa-cog"></i>',
            ])
            @slot('btns')
                {!! $node->btnCrud(['title' => true, 'class' => 'dropdown-item', 'group' => false, 'in_admin' => $in_admin]) !!}
                @foreach ($node->itemActions() as $action)
                    {!! $action->btnHtml(['title' => true, 'class' => 'dropdown-item', 'in_admin' => $in_admin]) !!}
                @endforeach
            @endslot
        @endcomponent

        @if ( Panel::make()->get($node->row)->treeSonsCount())
            <i class="menu-arrow  menu-toggle"></i>
        @endif
    </span>

    <div class="menu-submenu ">
        @if ( Panel::make()->get($node->row)->treeSonsCount())
            <i class="menu-arrow"></i>
        @endif
        @component('theme::components.ver_menu.container', ['ul_class' => 'menu-subnav'])
            @slot('content')
                @component('theme::components.lists.item', [
                    'li_class' => 'menu-item menu-item-parent',
                    'li_attribute' => 'aria-haspopup="true"',
                    ])
                    @slot('content')
                        <span class="menu-link">
                            <span class="menu-text">{{  Panel::make()->get($node->row)->treeLabel() }} [{{ $node->id() }} ]</span>
                        </span>
                    @endslot
                @endcomponent
                @foreach ( Panel::make()->get($node->row)->treeSons() as $k_type => $sons)
                    {{-- @php
                        dddx($k_type)
                    @endphp --}}
                    @foreach ($sons as $son)
                        @component('theme::components.ver_menu.item1', [
                            'li_class' => 'menu-item menu-item-submenu',
                            'li_attribute' => 'aria-haspopup="true" data-menu-toggle="hover"',
                            'node' => Panel::make()->get($son)->setParent($node),
                            'icon' => Theme::renderIcon(Theme::tenantConfig('icons.'.Theme::tenantConfig('xra.adm_theme').'.tree.' . $k_type)),
                            'in_admin' => $in_admin,
                            ])
                        @endcomponent
                    @endforeach

                @endforeach
            @endslot
        @endcomponent
    </div>
</li>
