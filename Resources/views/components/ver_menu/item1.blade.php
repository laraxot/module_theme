<li class="{{ $li_class ?? ''}}" {{ $li_attribute ?? ''}}>
    <span class="menu-link ">
        <span class="svg-icon menu-icon">
            {!! $icon !!}
        </span>
        <span class="menu-text menu-toggle">{{ $node->row->treeLabel() }} [{{ $node->id() }} ]</span>
    
        @component('theme::components.dropdowns.simple',[
            'btn_class'=>'btn btn-dark',
            'title'=>'<i class="fas fa-cog"></i>',
            ])
        @slot('btns')
         {!! $node->btnCrud(
            ['title' => true, 'class' => 'dropdown-item', 'group' => false,'in_admin'=>$in_admin]
        ) !!}
        @foreach ($node->itemActions() as $action) 
            {!! $action->btnHtml(['title' => true, 'class' => 'dropdown-item','in_admin'=>$in_admin]) !!}
        @endforeach
        @endslot
        @endcomponent

        @if($node->row->treeSonsCount())
            <i class="menu-arrow  menu-toggle"></i>
        @endif
    </span>

    <div class="menu-submenu ">
        @if($node->row->treeSonsCount())
            <i class="menu-arrow"></i>
        @endif
        @component('theme::components.ver_menu.container', ['ul_class' => 'menu-subnav'])
            @slot('content')
                @component('theme::components.lists.item', [
                    'li_class' => 'menu-item  menu-item-parent', 
                    'li_attribute'=> 'aria-haspopup="true"'
                    ])
                    @slot('content')
                        <span class="menu-link">
                            <span class="menu-text">{{ $node->row->treeLabel() }} [{{ $node->id() }} ]</span>
                        </span>
                    @endslot
                @endcomponent
                @foreach($node->row->treeSons() as $k_type=>$sons)
                    @foreach($sons as $son)
                        @component('theme::components.ver_menu.item1', [
                            'li_class' => 'menu-item  menu-item-submenu', 
                            'li_attribute'=> 'aria-haspopup="true" data-menu-toggle="hover"',
                            'node' => Panel::get($son)->setParent($node),
                            'icon'=> Theme::renderIcon(Theme::tenantConfig('icons.tree.'.$k_type)),
                            'in_admin'=>$in_admin,
                            ])
                        @endcomponent
                    @endforeach
                @endforeach
            @endslot
        @endcomponent
    </div>
</li>