<!-- start: FOOTER -->
<footer class="footer">
	<div class="container">
		<!-- top footer statrs -->
		<div class="row top-footer">
			<div class="footer_logo">
				<a href="#">
					<img src="{{ Theme::url('/theme/pub/images/logos/foodtribu8.png') }}" alt="Footer logo" height="50"> </a> <br/>
					<span>@lang('pub_theme::footer.order_delivery_takeout')</span> <br/><br/><br/>
					<h5>@lang('pub_theme::footer.follow_me')</h5>
                            <span itemscope itemtype="http://schema.org/Organization">
                            <link itemprop="url" href="https://www.foodfriendfinder.com">
                                 <a href="{{ url('http://www.facebook.com/foodfriendfindercom') }}" class="btn btn-social-icon btn-facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                <!-- <a href="{{ url('http://www.twitter.com/FoodFriendFinde') }}" class="btn btn-social-icon btn-twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                 <a href="{{ url('https://plus.google.com/104035968244380319088') }}" class="btn btn-social-icon btn-google-plus" target="_blank"><i class="fa fa-google-plus"></i></a>-->
                                 <a href="{{ url('https://www.instagram.com/foodfriendfinder') }}" class="btn btn-social-icon btn-instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                 <!--  <a href="{{ url('https://www.linkedin.com/company/foodfriendfinder/') }}" class="btn btn-social-icon btn-linkedin" target="_blank"><i class="fa fa-linkedin"></i></a><br/>
                                 <a href="{{ url('https://foodfriendfinder.tumblr.com/') }}" class="btn btn-social-icon btn-tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>
                                 <a href="{{ url('https://www.youtube.com/channel/UCqi2naxxvPIRBn-fGov1-ww') }}" class="btn btn-social-icon btn-youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                                 <a href="{{ url('https://myspace.com/foodfriendfinder') }}" class="btn btn-social-icon btn-user" target="_blank"><i class="fa fa-users"></i></a>
                                 <a href="{{ url('https://it.pinterest.com/foodfriendfinder/') }}" class="btn btn-social-icon btn-pinterest-p" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                 <a href="{{ url('https://soundcloud.com/foodfriendfinder') }}" class="btn btn-social-icon btn-soundcloud" target="_blank"><i class="fa fa-soundcloud"></i></a>-->
                                    </span>
				</div>
			{{--
			@include('pub_theme::layouts.partials.footer.how_it_works')
			@include('pub_theme::layouts.partials.footer.pages')
			@include('pub_theme::layouts.partials.footer.pop_cuisineCats')
			--}}
			{{--  
			@include('pub_theme::layouts.partials.footer.pop_restaurants')
			@include('pub_theme::layouts.partials.footer.pages')
			@include('pub_theme::layouts.partials.footer.pop_locations')
			--}}
			
			{!! Theme::cache('pub_theme::layouts.partials.footer.pop_restaurants',['restaurant'=>$restaurant]) !!}
			{!! Theme::cache('pub_theme::layouts.partials.footer.pages',['page'=>$page]) !!}
			{!! Theme::cache('pub_theme::layouts.partials.footer.pop_locations',['location'=>$location]) !!}
			
		</div>
		<!-- top footer ends -->
		<!-- bottom footer statrs -->
		<div class="bottom-footer">
			<div class="row">

				 {{-- quando attiviamo i pagamenti mostriamo le tipologie
				 <div class="footer_payment">
					<h5>Payment Options</h5>
							<a href="#"> <img src="/themes/foodpicky/images/paypal.png" alt="Paypal"> </a>

							<a href="#"> <img src="/themes/foodpicky/images/mastercard.png" alt="Mastercard"> </a>

							<a href="#"> <img src="/themes/foodpicky/images/maestro.png" alt="Maestro"> </a>

							<a href="#"> <img src="/themes/foodpicky/images/stripe.png" alt="Stripe"> </a>

							<a href="#"> <img src="/themes/foodpicky/images/bitcoin.png" alt="Bitcoin"> </a>
				</div>
				--}}
			</div>
		</div>
		<!-- bottom footer ends -->
	</div>
</footer>
<!-- end:Footer -->



