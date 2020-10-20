<li class="menu-item menu-item-submenu {{ $menu_item_open ? 'menu-item-open':'' }}" aria-haspopup="true" data-menu-toggle="hover">
    <div class="menu-link menu-toggle">
        <span class="{{-- menu-linkmenu-toggle --}} svg-icon menu-icon">
            {{ $icon ?? '' }}
        </span>
        <span class="menu-text" wire:click="showSubs({{ $parent }}-{{ $id }},'{{ $model_name }}')">{!! $title !!}</span>
        {!! $btns !!}
        <i class="menu-arrow"></i>
    </div>
    
        
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            @foreach($sons as $son)
                @component('theme::components.ver_menu.item',[
                            'sons'=>$son->sons ?? [],
                            'model_name'=>$son->model_name,
                            'btns' => '',
                            'menu_item_open' => '',
                            'parent'=>$parent.'-'.$id
                            ])
                    @slot('title')
                     {{ $son['nome'] }}   
                    @endslot
                    @slot('id')
                     {{ $son['id'] }}   
                    @endslot
                @endcomponent
            @endforeach
        </ul>
    </div>
</li>