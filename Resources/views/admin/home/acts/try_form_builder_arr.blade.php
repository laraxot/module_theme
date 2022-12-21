@extends('adm_theme::layouts.app')
@section('content')
    @php
        $arr = [
            [
                'type' => 'String',
                'name' => 'type',
                'comment' => null,
            ],
            [
                'type' => 'String',
                'name' => 'title',
                'comment' => null,
            ],
        ];
        
        $btn = [
            [
                'label' => 'Button 1',
            ],
            [
                'label' => 'Button 2',
            ],
        ];
    @endphp


    <h3>Form Builder </h3>
    <x-form.builder.arr :arr="$arr" :btn="$btn"></x-form.builder.arr>
@endsection
