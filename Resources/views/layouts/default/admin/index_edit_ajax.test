@php
	$tabs=$row->tabs;
	$parent_tabs=$row->parent_tabs;
	$edit_type=snake_case($row->post_type);
@endphp
@include('extend::includes.components')
@include('extend::includes.flash')
@include('extend::modal_ajax')
{!! Theme::include('header',['edit_type'=>$row_type],get_defined_vars() ) !!}
<section class="restaurants-page">
	<div class="container">
		<div class="row">
			{!! Theme::include($view_body,[],get_defined_vars() ) !!}
		</div>
	</div> 
</section>
{!! Theme::include('footer',['edit_type'=>$row_type],get_defined_vars() ) !!}
	