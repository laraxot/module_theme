@verbatim
<!DOCTYPE html>
<html>
  <head>
    <title>Clustered Features</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v5.3.0/css/ol.css" type="text/css">
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>

  </head>
  <body>
    <div id="map" class="map"></div>
    <form>
      <label>cluster distance</label>
      <input id="distance" type="range" min="0" max="100" step="1" value="40"/>
    </form>
    <script>
      import Feature from 'ol/Feature.js';
      import Map from 'ol/Map.js';
      import View from 'ol/View.js';
      import Point from 'ol/geom/Point.js';
      import {Tile as TileLayer, Vector as VectorLayer} from 'ol/layer.js';
      import {Cluster, OSM, Vector as VectorSource} from 'ol/source.js';
      import {Circle as CircleStyle, Fill, Stroke, Style, Text} from 'ol/style.js';


      var distance = document.getElementById('distance');

      var count = 20000;
      var features = new Array(count);
      var e = 4500000;
      for (var i = 0; i < count; ++i) {
        var coordinates = [2 * e * Math.random() - e, 2 * e * Math.random() - e];
        features[i] = new Feature(new Point(coordinates));
      }

      var source = new VectorSource({
        features: features
      });

      var clusterSource = new Cluster({
        distance: parseInt(distance.value, 10),
        source: source
      });

      var styleCache = {};
      var clusters = new VectorLayer({
        source: clusterSource,
        style: function(feature) {
          var size = feature.get('features').length;
          var style = styleCache[size];
          if (!style) {
            style = new Style({
              image: new CircleStyle({
                radius: 10,
                stroke: new Stroke({
                  color: '#fff'
                }),
                fill: new Fill({
                  color: '#3399CC'
                })
              }),
              text: new Text({
                text: size.toString(),
                fill: new Fill({
                  color: '#fff'
                })
              })
            });
            styleCache[size] = style;
          }
          return style;
        }
      });

      var raster = new TileLayer({
        source: new OSM()
      });

      var map = new Map({
        layers: [raster, clusters],
        target: 'map',
        view: new View({
          center: [0, 0],
          zoom: 2
        })
      });

      distance.addEventListener('input', function() {
        clusterSource.setDistance(parseInt(distance.value, 10));
      });
    </script>
  </body>
</html>
@endverbatim