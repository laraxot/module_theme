@php
    //dddx(get_defined_vars());
    //Theme::add('https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js');
@endphp
@extends('adm_theme::layouts.app')
@section('content')



@if(isset($params['module']))
    @php
        $view_index_order = $params['module'].'::livewire.index_order';
    @endphp
    @if(view()->exists($view_index_order))
        @livewire($params['module'].'::crud.index_order', ['rows' => $rows])
    @endif
@else
    @livewire('formx::crud.index_order', ['rows' => $rows])
@endif


{{-- 
    <ul>
        @foreach($rows as $row)
        
        <li>
            {{ $row->treeLabel() }}
            
        </li>
        @endforeach
    </ul>
--}}

@endsection