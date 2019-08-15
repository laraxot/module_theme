<div class="widget clearfix">
	<!-- /widget heading -->
	<div class="widget-heading">
		<h3 class="widget-title text-dark">
				@lang($view.'.Searchfilter') 

			</h3>
		<div class="clearfix"></div>
	</div>
	<div class="widget-body">
		<form class="row" method="GET" action="{{ asset($lang.'/restaurant_map') }}">
			<input type="hidden" name='lat' value="{{ \Request::input('lat') }}" />
			<input type="hidden" name='lng' value="{{ \Request::input('lng') }}" />
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="form-group">
					<input type="text" name="q" value="{{ \Request::input('q') }}" class="form-control" placeholder="@lang($view.'.keyword') ">
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="form-group">
					<input type="text" name="cuisine_cat" class="form-control" placeholder="@lang($view.'.cuisine_cat') ">
				</div>
			</div>


			{{--
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="form-group">
					<select class="form-control" id="exampleSelect1">
						<option>@lang($view.'.category')</option>
						<option>@lang($view.'.fastfood')</option>
						<option>@lang($view.'.pizza')</option>
						<option>@lang($view.'.restaurant')</option>
					</select>
				</div>
			</div>
			--}}
			<div class="col-xs-12 col-md-6 col-lg-3">
				{{--
				<a href="food_results.html" class="btn theme-btn  btn-block" style="border-radius: 12px;">@lang($view.'.invia')</a>
				--}}
				<input type="submit" value="{{ trans($view.'.invia') }}" class="btn theme-btn  btn-block" style="border-radius: 12px;" />
			</div>
		</form>
	</div>
</div>
{{--
<!-- end:Pricing widget -->
<div class="widget clearfix">
	<!-- /widget heading -->
	<div class="widget-heading">
		<h3 class="widget-title text-dark">
				Price range
			</h3>
		<div class="clearfix"></div>
	</div>
	<div class="widget-body">
		<div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel"> Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>€</span>
			<br>
			<input id="ex2" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="35" /> </div>
	</div>
</div>
<!-- end:Pricing widget -->
--}}
