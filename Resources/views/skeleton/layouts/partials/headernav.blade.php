<header id="header" class="{{ isset($header_class)?$header_class:"header-scroll top-header headrom" }}">
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
		@include('pub_theme::auth.links')
  		@include('pub_theme::layouts.partials.headernav.lang')
		@include('pub_theme::layouts.partials.headernav.add_restaurant')
	</nav>
</header>
