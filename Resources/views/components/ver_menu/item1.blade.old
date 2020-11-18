<li class="{{ $li_class }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="#" class="menu-link menu-toggle">
        <span class="menu-text">{{ $node->row->treeLabel() }}   [{{ $node->id() }} ]</span>
        <i class="menu-arrow"></i>
	</a>
    
    <div class="menu-submenu">
        <span class="menu-arrow"></span>
        <ul class="menu-subnav">
        @foreach($node->row->treeSons() as $sons)
            @foreach($sons as $son)
                @component('theme::components.ver_menu.item1',['node'=>Panel::get($son)->setParent($node), 'li_class' => 'menu-item  menu-item-parent'])
                    
                @endcomponent
            @endforeach
        @endforeach
        </ul>
    </div>
</li>




