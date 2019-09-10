@extends('adm_theme::layouts.app')
@section('page_heading',$params['module'])
@section('content')
@include('theme::includes.flash')
@include('theme::modal_ajax')
@php  
	if(!is_object($row)) return ;
	$row_panel=Panel::get($row);
@endphp
{{--  
<style>
	fieldset{
		border:1px solid darkgray;
	}
</style>
{!! Form::bsBtnGear(['row'=>$row]) !!}
--}}
<div class="page-wrapper">
	{!! Theme::include('inner_page',[],get_defined_vars() ) !!}
	@include('adm_theme::layouts.partials.breadcrumb')
	@include('adm_theme::layouts.partials.tabs',['tabs'=>$row_panel->getTabs()])
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
