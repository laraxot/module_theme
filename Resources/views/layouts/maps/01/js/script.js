
	//var mymap = L.map('mapid').setView([45.49, 11.33], 13);
	var mymap = L.map('map',{
    	fullscreenControl: {
        	pseudoFullscreen: false
    	}
    	//,scrollWheelZoom:false
  	})
  	//.fitWorld()

  	
  	//mymap.setView([lat, lng], 13);
  	mymap.setView(new L.LatLng(lat, lng), 15);


	var $access_token='pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token='+$access_token, {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

  	

	function loadMarkers(){
    	var ajax_url = $(location).attr('href');
    	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});
		var formData = {
			mapWestLng: 	mymap.getBounds().getWest(),
			mapEastLng: 	mymap.getBounds().getEast(),
			mapSouthLat: 	mymap.getBounds().getSouth(),
			mapNorthLat: 	mymap.getBounds().getNorth(),
			dataType:       'json'
		};
    	$.ajax({
			url: ajax_url,
			type: 'get',
			dataType: 'json',
			data: formData, //querystring,
			success: function(response) {
				//console.log(response); //4 debug
				showMarkers(response.data, mymap);
				showItems(response.data,'.search-result-wrapper');
				//geojsonLayer = L.geoJson(response).addTo(map);
        		//map.fitBounds(geojsonLayer.getBounds());
			},
			error: function(response) {
				console.log(response);
				$('#error').html(response.responseText);
			}
		});
    };

    function showMarkers(data, map) {
    	//var cities = L.layerGroup();
    	var markers = L.markerClusterGroup();
		for (var i = 0; i < data.length; i++) {
			var row = data[i];
			var customPopup = `
			<img class="wwone__map-infobox__thumb" src="##img_src##" />
			<div class="wwone__map-infobox__badge">##distance## Km</div>
			<div class="wwone__map-infobox__inner">
				<div class="wwone__map-infobox__inner__heading">##title##</div>
				<div class="wwone__map-infobox__inner__location">##subtitle##</div>
				<div class="wwone__map-infobox__inner__info">
					<div class="wwone__map-infobox__inner__info__type"><i class="fa fa-cutlery" aria-hidden="true"></i> ##cuisineCat_list##</div>
					
				</div>
				<a class="wwone__map-infobox__inner__btn btn" href="##url##" target="_blank">View &raquo;</a>
			</div>`;
			/* //--- da mettere in un secondo momento, anche terzo momento
			<div class="wwone__map-infobox__inner__info__location"><strong>Working:</strong> ##open-close##</div>
					<div class="wwone__map-infobox__inner__info__date"><strong>Delivery:</strong> ##delivery##</div>
			*/

			for (var itm in row) {
				//console.log(itm);
				customPopup = customPopup.replace('##' + itm + '##', row[itm]);
			}
			var customOptions ={
        		'maxWidth': '500',
        		'className' : 'custom'
        	};
			//var myIcon=L.icon.glyph({ prefix: 'fa', glyph: 'globe' });
			var marker=L.marker([row.lat,row.lng],{title: row.title}/*,{icon: myIcon}*/).bindPopup(customPopup,customOptions);//.addTo(map);
			markers.addLayer(marker);
		}
		map.addLayer(markers);

	}

	function showItems($data,div){
		var $html='&nbsp;&nbsp;&nbsp;&nbsp;<h3>N:'+$data.length+'</h3>';
		var $localTemplate = `<div class="col-xs-12 col-sm-6 col-md-6 food-item">
		<div class="food-item-wrap">
			<div class="figure-wrap bg-image" style="background-image: url(##img_src##);background-repeat: no-repeat;background-position: center;">
				<div class="distance"><i class="fa fa-pin"></i>##distance## Km</div>
			</div>
			<div class="content">
				<h5><a href="##post_url##">##title##</a></h5>
				<div class="product-name">##subtitle##</div>
				<div class="price-btn-block">
					<i class="fa fa-cutlery" aria-hidden="true"></i>
							<span itemprop="servesCuisine" class="">##cuisineCat_list##</span>,
							<br/>
			    			##address##
					<a href="##url##" class="btn theme-btn-dash pull-right">View</a>
				</div>
			</div>
			</div>
		</div>
		`;
		for (var i = 0; i < $data.length; i++) {
			var $row = $data[i];
			$tmp=$localTemplate;
			//console.log(this);
			for (var itm in $row) {

				console.log($row[itm]);
				//$tmp = $tmp.replace('##' + itm + '##', $row[itm]); //fa 1 replace solo ..
				$tmp=$tmp.split('##' + itm + '##').join($row[itm]);  //li fa tutti
			}
			$html+=$tmp;
		}
		$(div).html($html);
	}

	//mymap.on('dragend',loadMarkers);
	mymap.on('moveend', loadMarkers);
	mymap.on('zoomend', loadMarkers);
	mymap.on('dragend', loadMarkers);

	loadMarkers();
	/*mygeojsonlayer.clearLayers();
    mygeojsonlayer = L.geoJson(my_geojson_data);
    mygeojsonlayer.addTo(map);
    */


	// load GeoJSON from an external file
	//https://leanpub.com/leaflet-tips-and-tricks/read  !!!!!
	//http://labs.easyblog.it/maps/leaflet-geojson-selector/examples/reload-layer.html  sempre utile la mappa dell'italia interattiva
	//https://bl.ocks.org/tristen/1b0d608ca292e9f22cad mappa con contorni carini
	//https://maptimeboston.github.io/leaflet-intro/
	//https://raw.githubusercontent.com/calvinmetcalf/leaflet-ajax/master/dist/leaflet.ajax.min.js
	//https://github.com/calvinmetcalf/leaflet-ajax
	//lo fa https://github.com/stefanocudini/leaflet-layerJSON/tree/master/dist .. ma aggiungere troppi plugin
	//http://lyzidiamond.com/posts/external-geojson-and-leaflet-the-other-way
	//https://developers.google.com/maps/documentation/javascript/examples/layer-data-dragndrop  //geojson

  	//$.getJSON("rodents.geojson",function(data){
    	// add GeoJSON layer to the map once the file is loaded
    	//L.geoJson(data).addTo(map);
  	//});

	$(".leaflet-top").toggleClass('leaflet-top leaflet-bottom');

	//mymap.locate({setView: true, maxZoom: 16});


//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::                                                                         :::
//:::  This routine calculates the distance between two points (given the     :::
//:::  latitude/longitude of those points). It is being used to calculate     :::
//:::  the distance between two locations using GeoDataSource (TM) prodducts  :::
//:::                                                                         :::
//:::  Definitions:                                                           :::
//:::    South latitudes are negative, east longitudes are positive           :::
//:::                                                                         :::
//:::  Passed to function:                                                    :::
//:::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :::
//:::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :::
//:::    unit = the unit you desire for results                               :::
//:::           where: 'M' is statute miles (default)                         :::
//:::                  'K' is kilometers                                      :::
//:::                  'N' is nautical miles                                  :::
//:::                                                                         :::
//:::  Worldwide cities and other features databases with latitude longitude  :::
//:::  are available at https://www.geodatasource.com                         :::
//:::                                                                         :::
//:::  For enquiries, please contact sales@geodatasource.com                  :::
//:::                                                                         :::
//:::  Official Web site: https://www.geodatasource.com                       :::
//:::                                                                         :::
//:::               GeoDataSource.com (C) All Rights Reserved 2018            :::
//:::                                                                         :::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function distance(lat1, lon1, lat2, lon2, unit) {
	if ((lat1 == lat2) && (lon1 == lon2)) {
		return 0;
	}
	else {
		var radlat1 = Math.PI * lat1/180;
		var radlat2 = Math.PI * lat2/180;
		var theta = lon1-lon2;
		var radtheta = Math.PI * theta/180;
		var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
		if (dist > 1) {
			dist = 1;
		}
		dist = Math.acos(dist);
		dist = dist * 180/Math.PI;
		dist = dist * 60 * 1.1515;
		if (unit=="K") { dist = dist * 1.609344 }
		if (unit=="N") { dist = dist * 0.8684 }
		return dist;
	}
}