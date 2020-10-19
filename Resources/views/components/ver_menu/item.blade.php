<li class="menu-item menu-item-submenu {{-- menu-item-open --}}" aria-haspopup="true" data-menu-toggle="hover">
    {{--  
    <a href="#" class="menu-link menu-toggle">
    --}}
    <span class="menu-link menu-toggle">
        {{ $icon ?? '' }}
        <span class="menu-text">{{ $title }}</span>
        {{ $btns }}
        <span wire:click="showSubs({{ $id }},'{{ $model_name }}')"><i class="menu-arrow" ></i></span>
    {{--  
    </a>
    --}}
    </span>
        
    <div class="menu-submenu ">
        <span class="menu-arrow"></span>

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