@extends('adm_theme::layouts.app')
@section('page_heading',$params['module'])
@section('content')
@include('extend::includes.flash')
@include('extend::modal_ajax')
{{--  
<style>
	fieldset{
		border:1px solid darkgray;
	}
</style>
--}}
@php  
	if(!is_object($row)) return ;
@endphp
{!! Form::bsBtnGear(['row'=>$row]) !!}
<div class="page-wrapper">
	{!! Theme::include('inner_page',[],get_defined_vars() ) !!}
	@include('adm_theme::layouts.partials.breadcrumb')
	
	@php
		/*
		
		*/
	@endphp
	{{--
	--}}
	@include('adm_theme::layouts.partials.tabs',['tabs'=>$_panel->tabs()])
	{{-- $_layout->act --}}
	@if(Str::startsWith($_layout->act,'index'))
		@if(is_array($_panel->indexNav()))
		@include('adm_theme::layouts.partials.nav',['nav'=>$_panel->indexNav()])
		@else
		{!! $_panel->indexNav() !!}
		@endif
	@endif
	<section class="create-page inner-page">
		<div class="container-fluid">
			<div class="row">
				@include('theme::layouts.default.admin.common.'.$_layout->view_body)
			</div>
		</div>
	</section>
</div>
@endsection
