<!--header starts-->
{{--
<header id="header" class="{{ isset($header_class)?$header_class:"header-scroll top-header headrom" }}">
<!-- .navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="500">
	<div class="container">
		<div class="navbar-translate">
			<a class="navbar-brand" href="https://www.creative-tim.com">
			<img class="img-rounded" src="{{ Theme::url('/theme/pub/images/logos/foodtribu8.png') }}" alt="logo" height="40">
			</a>
			<button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-bar"></span>
			<span class="navbar-toggler-bar"></span>
			<span class="navbar-toggler-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbarToggler">
			<ul class="navbar-nav ml-auto">
				@include('pub_theme::auth.links')
				@include('pub_theme::layouts.partials.headernav.lang')
				<!--
					<li class="nav-item">
					    <a href="documentation/tutorial-components.html" target="_blank" class="nav-link"><i class="nc-icon nc-book-bookmark"></i> Documentation</a>
					</li>
					-->
				<li class="nav-item">
					<a href="https://www.creative-tim.com/product/paper-kit-2?ref=pk2-free-local" target="_blank" class="btn btn-danger btn-round">Free Download</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- End Navbar -->
<!-- /.navbar -->
</header>
--}}

<header id="header" class="{{ isset($header_class)?$header_class:"header-scroll top-header headrom" }}">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">



{{--<a class="navbar-brand" href="{{ url('/'.$lang) }}">
		<img class="img-rounded" src="{{ Theme::url('/theme/pub/images/logos/foodtribu8.png') }}" alt="logo" height="40">
	</a>--}}

<a class="navbar-brand" href="{{ url('/'.$lang) }}">
	<div itemscope itemtype="http://schema.org/Service">
			<h1 style="display:none;"><span itemprop="name">FoodTribù</span></h1>
			<img itemprop="logo" class="img-rounded" src="{{ Theme::url('/theme/pub/images/logos/foodtribu8.png') }}" alt="foodtribù logo" height="40"/>
			<span itemprop="description" style="display:none;">La migliore app di cibo d'asporto</span>
	</div>
</a>



	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		{{--
		<ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
		--}}
		<ul class="navbar-nav ml-md-auto d-md-flex">
			<li class="nav-item active">
				<a class="nav-link" href="{{ url($lang) }}">Home <span class="sr-only">(current)</span></a>
			</li>
			@include('pub_theme::auth.links')
  		@include('pub_theme::layouts.partials.headernav.lang')
			@include('pub_theme::layouts.partials.headernav.add_restaurant')
		</ul>
		{{-- </ul> --}}
	</div>
</nav>
</header>

{{--
 <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
<header id="header" class="{{ isset($header_class)?$header_class:"header-scroll top-header headrom" }}">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  	<a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="Bootstrap">
  		<img class="img-rounded" src="{{ Theme::url('/theme/pub/images/logos/foodtribu8.png') }}" alt="logo" height="40">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

  	<div class="navbar-nav-scroll">
    	<ul class="navbar-nav bd-navbar-nav flex-row">
      		<li class="nav-item">
        		<a class="nav-link " href="{{url($lang)}}" >Home</a>
      		</li>
    	</ul>
  	</div>
  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
  	<ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
  		@include('lu::auth.links')
  		@include('pub_theme::layouts.partials.headernav.lang')
    	<li class="nav-item">
			<a href="https://www.creative-tim.com/product/paper-kit-2?ref=pk2-free-local" target="_blank" class="btn btn-danger btn-round">Free Download</a>
		</li>
  	</ul>
  	</div>
</nav>
</header>
--}}


{{--
<header id="header" class="{{ isset($header_class)?$header_class:"header-scroll top-header headrom" }}">
<nav class="navbar navbar-dark">
	<a class="navbar-brand" href="{{ url($lang) }}">
	<img class="img-rounded" src="{{ Theme::url('/theme/pub/images/logos/foodtribu8.png') }}" alt="logo" height="40">
	</a>
	<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Dropdown
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>
</header>
--}}
