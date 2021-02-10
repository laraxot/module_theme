@php
//dddx(get_defined_vars());
//dddx($_panel->containerActions());
//dddx($_panel->rows()->paginate(20));
if($rows==null){
    dddx($rows_err);
}
@endphp
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e9ecef; padding:5px; ">
    {{--
    {!! $_panel->btnHtml(['act'=>'create']) !!}
    --}}
	@foreach($_panel->containerActions() as $act)
	@php
	try{
	//$act->setPanel($_panel);
	echo $act->btnHtml();
	}catch(\Exception $e){
	//ddd(['act'=>$act,'e'=>$e]);
	}
	@endphp
	@endforeach
	<p>
		<span class="primary-color"><strong>{{ number_format($rows->total(),0,',',' ') }}</strong></span>
		{{ Str::plural($row->post_type ?? class_basename($row),$rows->total()) }}
	</p>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent" >
		{{--
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		--}}
		<div class="col">
		</div>
		@if($_panel->hasLang())
		@include('formx::includes.components.form_complete.lang',['form_class'=>'form-inline my-2 my-lg-0'])
		@endif
		@include('formx::includes.components.form_complete.search',['form_class'=>'form-inline my-2 my-lg-0'])
		@include('formx::includes.components.form_complete.order_by',['form_class'=>'form-inline my-2 my-lg-0'])
		{{--
		<form method="get" class="form-inline my-2 my-lg-0">
			<div class="input-group">
				<select id="sort[by]" name="sort[by]" class="form-control">
					<option selected="selected" value=""></option>
				</select>
				<select id="sort[order]" name="sort[order]" class="form-control">
					<option selected="selected" value=""></option>
					<option value="desc">aadesc</option>
					<option value="asc">asc</option>
				</select>
			</div>
			<div class="input-group-append">
				<button type="submit" class="btn btn-primary"><i class="fas fa-sort fa-sm"></i></button>
			</div>
		</form>
		--}}
	</div>
</nav>
