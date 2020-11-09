@php
    //dddx(get_defined_vars());
    //Theme::add('https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js');
@endphp
@extends('adm_theme::layouts.app')
@section('content')

@livewire('formx::crud.index_order', ['rows' => $rows])
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