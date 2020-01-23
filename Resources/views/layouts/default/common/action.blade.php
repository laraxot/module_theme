@extends('pub_theme::layouts.app')
@section('page_heading',trans($view.'.page_heading'))
@section('content')
@include('theme::includes.flash')
@include('theme::modal_ajax')
@php
	$panel=Panel::get($row);
@endphp

{!! Form::bsBtnGear(['row'=>$row]) !!}

<div class="page-wrapper">
	{!! Theme::include('inner_page',[],get_defined_vars() ) !!}
	@include('pub_theme::layouts.partials.breadcrumb')
	@include('pub_theme::layouts.partials.tabs',['tabs'=>$panel->getTabs()])
	<section class="create-page inner-page">
		<div class="container">
		{!! Theme::include('topbar',[],get_defined_vars() ) !!}
			<div class="row">
				@include('theme::layouts.default.common.'.$_layout->view_body)
			</div>
		</div>
	</section>
</div>
@endsection
