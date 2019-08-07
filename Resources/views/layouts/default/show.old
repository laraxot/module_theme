@extends('pub_theme::layouts.app')
@section('content')
@include('extend::includes.components')
@include('extend::includes.flash')
@includeFirst([$view_default.'.btns.gear',$view_extend.'.btns.gear'])
@php 
	$tabs=$parent_tabs=$show_type=null;
	if(is_object($row)){	
		$tabs=$row->tabs;
		$parent_tabs=$row->parent_tabs;
		$show_type=snake_case($row->post_type);
	}else{
		$row=new \stdClass();
		$row->image_src='';
		$row->title='John Doe';
		$row->subtitle='this profile not exists';
		$row->txt='';
	}
	if($show_type==null && is_object($second_last)){
		$show_type=snake_case($second_last->post_type);
	}
	/*
	$view_body='';
	if(\View::exists($view.'.left') || \View::exists($view_default.'.left.'.$show_type) ) {
		$view_body.='left_';
	}
	$view_body.='body';
	if(\View::exists($view.'.right') || \View::exists($view_default.'.right.'.$show_type) ) {
		$view_body.='_right'; 
	}
	*/
@endphp

@if(isset($step)) 
	@include('pub_theme::layouts.partials.top_links',['step'=>$step])
@endif
@includeFirst(
	[
		$view.'.inner_page',
		$view_default.'.inner_page.'.$show_type,
		$view_extend.'.inner_page.'.$show_type,
		$view_default.'.inner_page',
		$view_extend.'.inner_page'
	],
	['row'=>$row,'show_type'=>$show_type]
)
@includeFirst(
	[
		$view_default.'.breadcrumb.'.$show_type,
		'pub_theme::layouts.partials.breadcrumb',
		'extend::layouts.partials.breadcrumb'
	]
)
@if(is_array($tabs))
	@includeFirst(
		[
			$view.'.tabs',
			$view_default.'.tabs',
			$view_extend.'.tabs'
		],
		['tabs'=>$tabs] 
	)
@endif
<section class="create-page inner-page">
    <div class="container">
        <div class="row">
        	{{--
            <div class="col-md-8">
            	@includeFirst([$view.'.body1',$view_default.'.body'])
			</div>
			<div class="col-md-4">
				@includeFirst([$view.'.right',$view_default.'.right'])
			</div>
			--}}
			@includeFirst(
				[
					$view_default.'.'.$view_body,
					$view_extend.'.'.$view_body,
				],
				['show_type'=>$show_type]
			)
		</div>
	</div>
</section>
@endsection