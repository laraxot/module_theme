@extends('adm_theme::layouts.app')
@section('content')
@include('extend::includes.components')
@include('extend::includes.flash')
@include('extend::modal_ajax')
@php 
// @includeFirst([$view_default.'.btns.gear',$view_extend.'.btns.gear'])
@endphp

@if(isset($step)) 
	@include('pub_theme::layouts.partials.top_links',['step'=>$step])
@endif
{!! Theme::include('inner_page',['row'=>$row,'show_type'=>$row_type],get_defined_vars() ) !!}
{!! Theme::include('breadcrumb',[],get_defined_vars() ) !!}
{!! Theme::include('tabs',['tabs'=>$row->tabs],get_defined_vars() ) !!}
<section class="create-page inner-page">
    <div class="container">
        <div class="row">
			{!! Theme::include($view_body,['show_type'=>$row_type],get_defined_vars() ) !!}
		</div>
	</div>
</section>
@endsection