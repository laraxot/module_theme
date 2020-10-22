<li class="menu-item menu-item-submenu menu-item-open{{-- $menu_item_open?'menu-item-open':'' --}}" aria-haspopup="true" data-menu-toggle="hover">
    <div class="menu-link menu-toggle">
        <span class="{{-- menu-linkmenu-toggle --}} svg-icon menu-icon">
            {{ $icon ?? '['.substr($model_name,0,1).']' }}
        </span>
        <span class="menu-text" wire:click="showSubs('{{ $parent }}-{{ $id }}','{{ $model_name }}')">{!! $title !!}</span>
        {!! $btns !!}
        <i class="menu-arrow" wire:click="showSubs('{{ $parent }}-{{ $id }}','{{ $model_name }}')"></i>
    </div>


    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            @foreach($sons as $son_type)
                @foreach($son_type as $son)
                    @php
                        if(!isset($son['model_name'])){
                            dddx(['item','son'=>$son, 'sons'=>$sons,'son_type'=>$son_type]);
                        }
                    @endphp
                    @component('theme::components.ver_menu.item',[
                                'sons'=>$son['sons'] ?? [],
                                'model_name'=>$son['model_name'],
                                'menu_item_open' => '',
                                'parent'=>$parent.'-'.$id,
                                'id'=>$son['model_name'].'-'.$son['tree_id'],
                                'title'=>$son['nome'],
                                ])
                        @slot('btns')
                        @component('theme::components.dropdowns.simple',[
                            'btn_class'=>'btn btn-dark',
                            'btns'=> $son['treeItemActions'] ?? '',
                            ])
                        @slot('title')<i class="fas fa-cog"></i>@endslot
                        @endcomponent
                    @endslot
                    @endcomponent
                @endforeach
            @endforeach
        </ul>
    </div>
</li>
