@extends('adm_theme::layouts.app')
@section('content')
    <div class="row">
        @foreach ($themes as $theme)
            <x-theme::card.img_top>
                <x-slot name="img_src">{{ Theme::themeScreenshot($theme->name) }}</x-slot>
                <x-slot name="title">{{ $theme->name }}</x-slot>
                <x-slot name="content">..</x-slot>
                <x-slot name="btns">
                    @if(config('xra.adm_theme')==$theme->name)
                        <h3>@lang('Current in use')</h3>
                    @else
                    {!! $_panel->btnItemAction('activate_adm_theme',['query_params'=>['theme'=>$theme->name]]) !!}
                    @endif
                </x-slot>
            </x-theme::card>
        @endforeach
    </div>
@endsection
