{{--
	forse sostituirlo con
	theme.components.lists.item
	che dovrebbe essere più generico?
	--}}

<li class="menu-item menu-item-submenu {{ $menu_item_open ? 'menu-item-open':'' }}" aria-haspopup="true" data-menu-toggle="hover">
    <div class="menu-link">
        {!! $icon !!}
        @if($have_sons)
            <span class="menu-text" wire:click="showSubs('{{ $parent }}-{{ $id }}','{{ $model_name }}')">{!! $title !!}</span>
            {!! $btns !!}
            <i class="menu-arrow" wire:click="showSubs('{{ $parent }}-{{ $id }}','{{ $model_name }}')"></i>
        @else
            <span class="menu-text">{!! $title !!}</span>
            {!! $btns !!}
        @endif
    </div>
    <div class="menu-submenu">
        <ul class="menu-subnav">
            @foreach($sons as $k_son=>$son_type)
                @foreach($son_type as $son)
                    @php
                        if(!isset($son['model_name'])){
                            dddx(['item','son'=>$son, 'sons'=>$sons,'son_type'=>$son_type]);
                        }
                    @endphp
                    @component('theme::components.ver_menu.item',[
                                'sons'=>$son['sons'] ?? [],
                                //'model_name'=>$son['model_name'],
                                'model_name'=>$k_son,
                                'menu_item_open' => $son['dropdown_submenu'],
                                'parent'=>$parent.'-'.$id,
                                'id'=>$son['model_name'].'-'.$son['tree_id'],
                                'title'=>$son['nome'],
                                'icon' => $son['icon'],
                                'have_sons' => $son['have_sons'],
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
