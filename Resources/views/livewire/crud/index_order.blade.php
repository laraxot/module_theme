@php
    Theme::add('https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js');
    
@endphp
<div>

    
        
        <ul wire:sortable="updateGroupOrder" wire:sortable-group="updateTaskOrder" wire:sortable-group.item-group="{{ $parent }}">
        {{-- <ulwire:sortable="updateOrder"> --}}
            @foreach($tree_nodes as $node_key=>$node_type)
                @foreach ($node_type as $row)

                    
                    <li wire:key="{{ $parent }}-{{ $row->id }}" wire:sortable-group.item="{{ $parent }}-{{ $row->id }}">
                    



                        <h4 wire:sortable.handle>{{ $row->treeLabel() }} - {{ $row->posizione }}</h4>
                        @include('theme::livewire.crud.index_order', ['tree_nodes' => $row->treeSons(),'parent'=>$parent.'-'.$node_key])
                        {{--  

                        <ul wire:sortable-group.item-group="{{ $node_key }}-{{ $row->id }}">

                            @foreach ($row->treeSons()  as $son_key=>$son_type)
                                @foreach ($son_type as $son)
                                    <li wire:key="{{ $son_key }}-{{ $son->id }}" wire:sortable-group.item="{{ $son_key }}-{{ $son->id }}">
                                        {{ $son->treeLabel() }} 


                                        


                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                        --}}

                    </li>
                @endforeach
            @endforeach
        {{-- </ul> --}}
    </ul>
    
    {{--  
    <div wire:sortable="updateGroupOrder" wire:sortable-group="updateOrder" style="display: flex">
        @foreach ($rows as $row)
            <div wire:key="group-{{ $row->id }}" wire:sortable.item="{{ $row->id }}">
                <div style="display: flex">
                    <h4 wire:sortable.handle>{{ $row->treeLabel() }}</h4>

                    <button wire:click="removeGroup({{ $row->id }})">Remove</button>
                </div>
                 
                <ul wire:sortable-group.item-group="{{ $row->id }}">
                    @foreach ($row['sons'] as $son)
                        <li wire:key="task-{{ $son->id }}" wire:sortable-group.item="{{ $son->id }}">
                            {{ $son->title }}
                            <button wire:click="removeTask({{ $son->id }})">Remove</button>
                        </li>
                    @endforeach
                </ul>
                
                <form wire:submit.prevent="addTask({{ $row->id }}, $event.target.title.value)">
                    <input type="text" name="title">

                    <button>Add Task</button>
                </form>
            </div>
        @endforeach

        <form wire:submit.prevent="addGroup">
            <input type="text" wire:model="newGroupLabel">

            <button>Add Task Group</button>
        </form>
    </div>
    --}}
</div>