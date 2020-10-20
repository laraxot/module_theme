<li class="menu-item menu-item-submenu menu-item-open
                {{-- $menu_item_open?'menu-item-open':'' --}}
                {{-- $menu_item_open --}}
                {{-- menu-item-open --}}
                " aria-haspopup="true" data-menu-toggle="hover">
    <div class="menu-link menu-toggle">
        <span class="{{-- menu-linkmenu-toggle --}} svg-icon menu-icon">
            {{ $icon ?? '' }}
        </span>
        <span class="menu-text" wire:click="showSubs({{ $id }},'{{ $model_name }}')">{{ $title }}</span>
        {{ $btns }}
        <i class="menu-arrow"></i>
        
        {{--  
            <span wire:click="showSubs({{ $id }},'{{ $model_name }}')"><i class="menu-arrow" ></i></span>
            
            <button class="btn btn-dark" wire:click="showSubs({{ $id }},'{{ $model_name }}')"><i class="menu-arrow" ></i></button>
            --}}
    </div>
    
        
    <div class="menu-submenu">
        {{-- <spanclass="menu-arrow"></span> --}}
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            @foreach($sons as $son)
                @component('theme::components.ver_menu.item',['sons'=>[],'model_name'=>'', 'btns' => '' ])
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