@php
	if(!is_object($row)) return;
@endphp
{{-- <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
	<i class="fa fa-map-marker" aria-hidden="true"></i>
		<span itemprop="postalCode">{{ $row->postal_code }}</span>
		<span itemprop="addressLocality">{{ $row->locality }}</span>,
		(<span itemprop="addressRegion">{{ $row->administrative_area_level_2_short }}</span>)
		<meta itemprop="addressCountry" content="{{ $row->country_short}}" />
</div> --}}


<div property="location" typeof="Place">
	<span property="name">{{ $row->formatted_address }}</span>
	<div class="address d-none" property="address" typeof="PostalAddress">
		<span property="streetAddress">{{ $row->route }}</span><br>
		<span property="addressLocality">{{ $row->locality }}</span>,
		<span property="addressRegion">{{ $row->administrative_area_level_1_short }}</span>
		<span property="postalCode">{{ $row->postal_code_short }}</span>
	</div>
</div>
