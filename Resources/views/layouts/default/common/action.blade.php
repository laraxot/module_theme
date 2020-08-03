@extends('pub_theme::layouts.app')
@section('page_heading',trans($view.'.page_heading'))
@section('content')
@include('theme::modal_ajax')
@php
	$panel=Panel::get($row);
@endphp
{{--
    {!! Form::bsBtnGear(['row'=>$row]) !!}
--}}

<div class="page-wrapper">
    {!! Theme::include('inner_page',[],get_defined_vars() ) !!}
    {{-- @include('pub_theme::layouts.partials.breadcrumb') --}}
    @if(View::exists('pub_theme::layouts.partials.breadcrumb'))
        @include('pub_theme::layouts.partials.breadcrumb')
    @else
        @include('theme::layouts.partials.breadcrumb')
    @endif
    @include('pub_theme::layouts.partials.tabs',['tabs'=>$panel->getTabs()])
    {{--  
        {!! Theme::include('tabs',['tabs'=>$panel->getTabs()],get_defined_vars() ) !!}
        --}}
	<section class="create-page inner-page">
        <div class="container">
            {!! Theme::include('topbar',[],get_defined_vars() ) !!}
            @include('theme::includes.flash')
			<div class="row">
                @include('theme::layouts.default.common.'.$_layout->view_body)
			</div>
		</div>
	</section>
</div>
@endsection
