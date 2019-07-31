@extends('pub_theme::layouts.app')
@section('page_heading',trans($view.'.page_heading'))
@section('content')
@include('extend::includes.flash')
@include('extend::modal_ajax')
{!! Form::bsBtnGear(['row'=>$row]) !!}
<div class="page-wrapper">
	{!! Theme::include('inner_page',[],get_defined_vars() ) !!}
	@include('pub_theme::layouts.partials.breadcrumb')
	@include('pub_theme::layouts.partials.tabs',['tabs'=>$_panel->tabs()])
	<section class="create-page inner-page">
		<div class="container">
			<div class="row">
				@include('theme::layouts.default.common.'.$_layout->view_body)
			</div>
		</div>
	</section>
</div>
@endsection
