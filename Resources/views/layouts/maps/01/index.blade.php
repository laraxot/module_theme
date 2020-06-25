@extends('pub_theme::layouts.app',['footer'=>'off','header_class'=>'top-header navbar-fixed-top'])
@section('content')

@include('theme::includes.flash')

@php
Theme::add('theme/bc/leaflet/dist/leaflet.css');
Theme::add('theme/bc/leaflet/dist/leaflet.js');
Theme::add('theme/bc/leaflet.markercluster/dist/leaflet.markercluster.js');
Theme::add('theme/bc/leaflet.markercluster/dist/MarkerCluster.css');
Theme::add('theme/bc/leaflet.markercluster/dist/MarkerCluster.Default.css');
Theme::add('theme/bc/Leaflet.fullscreen/dist/leaflet.fullscreen.css');
Theme::add('theme/bc/Leaflet.fullscreen/dist/Leaflet.fullscreen.min.js');
Theme::add('pub_theme::layouts.maps/01/js/script.js');

@endphp
<!-- PAGE CONTETNT -->
<section class="gl-page-content-section">
	<div class="container-fluid">
		<div class="row" style="margin-top: 15px;">
			<!-- SEARCH MAP -->
			<div class="map-wrapper map-split">
                <div id="map"></div>
            </div>
			<!-- SEARCH MAP END -->
			<!-- SEARCH -->
			<div id="map-result-section" class="offset-md-5 map-result-wrapper">
				<div class="widget clearfix">

				@include('pub_theme::layouts.maps.01.filter')

				<div id="error"></div>
				<div class="search-result-wrapper">	</div>
				</div>
			</div>
			<!-- SEARCH END-->
		</div>
	</div>
</section>
@endsection
