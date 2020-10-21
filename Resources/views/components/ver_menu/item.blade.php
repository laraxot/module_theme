<li class="menu-item menu-item-submenu menu-item-open{{-- $menu_item_open?'menu-item-open':'' --}}" aria-haspopup="true" data-menu-toggle="hover">
    <div class="menu-link menu-toggle">
        <span class="{{-- menu-linkmenu-toggle --}} svg-icon menu-icon">
            {{ $icon ?? '' }}
        </span>
        <span class="menu-text" wire:click="showSubs('{{ $parent }}-{{ $id }}','{{ $model_name }}')">{!! $title !!} [{{ $parent }}-{{ $id }} {{ $model_name }}]</span>
        {!! $btns !!}
        <i class="menu-arrow" wire:click="showSubs('{{ $parent }}-{{ $id }}','{{ $model_name }}')"></i>
    </div>
    
        
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            @php
                //dddx(['item',get_defined_vars()]);
            @endphp
            @foreach($sons as $son)
                @php
                    if(!isset($son['model_name'])){
                        dddx([$son, 'item']);
                    }
                @endphp
                @component('theme::components.ver_menu.item',[
                            'sons'=>$son['sons'] ?? [],
                            'model_name'=>$son['model_name'],
                            'btns' => '',
                            'menu_item_open' => '',
                            'parent'=>$parent.'-'.$id,
                            'id'=>$son['tree_id'],
                            'title'=>$son['nome'].'['.$son['tree_id'].']',
                            ])
                @endcomponent
            @endforeach
        </ul>
    </div>
</li>