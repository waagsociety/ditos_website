function loadMapbox(){
  mapboxgl.accessToken = 'pk.eyJ1IjoibWFydGludXN3YWFnIiwiYSI6ImNpdGZwb3JuZzAwZXMyeW1qM3V5OTAyMnEifQ.pVEGIeip9T4nE7H-NTyh0g';

  var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/martinuswaag/ciuds6yxn009a2ips6x62gfer',
      zoom: 6,
      center:[5.3770023,52.1626588],
      minZoom: 4,
      maxZoom: 10,
      pitch: 40,
  });

  map.on('style.load', function() {

    var bounds = new mapboxgl.LngLatBounds();

    geojson.features.forEach(function(feature) {
        bounds.extend(feature.geometry.coordinates);
    });

    if ( geojson.features.length > 1) {
      map.fitBounds(bounds, { padding: '100' });
    }
    else {
      map.flyTo({center: geojson.features[0].geometry.coordinates});
    }

    map.addSource("events", {
        type: "geojson",
        data: geojson
    });

    map.addLayer({
        "id": "markers",
        "type": "symbol",
        "source": "events",
        "layout": {
            "icon-image": "marker-15",
            "icon-size": 1
        }
    });
  });

  map.addControl(new mapboxgl.NavigationControl());
}

