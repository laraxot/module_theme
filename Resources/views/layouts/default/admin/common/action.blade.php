@extends('adm_theme::layouts.app')
@section('page_heading',$params['module'])
@section('content')
@include('extend::includes.flash')
@include('extend::modal_ajax')
<<<<<<< HEAD
=======
{{--  
<style>
	fieldset{
		border:1px solid darkgray;
	}
</style>
--}}
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
@php  
	if(!is_object($row)) return ;
@endphp
{!! Form::bsBtnGear(['row'=>$row]) !!}
<div class="page-wrapper">
	{!! Theme::include('inner_page',[],get_defined_vars() ) !!}
	@include('adm_theme::layouts.partials.breadcrumb')
<<<<<<< HEAD
	[Obj:{{ get_class($row) }}]
	[Panel:{{ get_class($_panel) }}]
=======
	
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
	@php
		/*
		
		*/
	@endphp
	{{--
	--}}
	@include('adm_theme::layouts.partials.tabs',['tabs'=>$_panel->tabs()])
<<<<<<< HEAD
	
	@if($_layout->act=='index')
		@include('adm_theme::layouts.partials.nav',['nav'=>$_panel->indexNav()])
=======
	{{-- $_layout->act --}}
	@if(Str::startsWith($_layout->act,'index'))
		@if(is_array($_panel->indexNav()))
		@include('adm_theme::layouts.partials.nav',['nav'=>$_panel->indexNav()])
		@else
		{!! $_panel->indexNav() !!}
		@endif
>>>>>>> 9fc4305a99742739f5c5d6b9f988e8b89580f3d0
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
