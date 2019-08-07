@extends('adm_theme::layouts.app')
@section('page_heading',trans($view.'.page_heading'))
@section('content')
@php
    if(!is_object($row)) return 'ID ERRATO';  //meglio bloccarlo prima della visualizzazione 
@endphp
@include('extend::includes.components')
@include('extend::includes.flash')
@include('extend::modal_ajax')
{{-- in amministrazione non mi serve il gear 
@include($view_default.'.btns.gear')
--}}
<div class="page-wrapper">
	{!! Theme::include('inner_page',['edit_type'=>$row_type],get_defined_vars() ) !!}
	{!! Theme::include('breadcrumb',[],get_defined_vars() ) !!}
    {{--
	{!! Theme::include('parent_tabs',['tabs'=>$row->parent_tabs],get_defined_vars() ) !!}
	{!! Theme::include('tabs',['tabs'=>$row->tabs],get_defined_vars() ) !!}
	--}}
    @include('adm_theme::layouts.partials.tabs',['tabs'=>$_panel->tabs()])
    <section class="create-page inner-page">
		<div class="container">
			<div class="row">
				{!! Theme::include('header',	['edit_type'=>$row_type],get_defined_vars() ) !!}
				{!! Theme::include($view_body,	['edit_type'=>$row_type],get_defined_vars() ) !!}
				{!! Theme::include('footer',	['edit_type'=>$row_type],get_defined_vars() ) !!}
			</div>
		</div>
	</section>
</div>
@endsection
