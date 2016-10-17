function loadMapbox(){
  mapboxgl.accessToken = 'pk.eyJ1IjoibWFydGludXN3YWFnIiwiYSI6ImNpdGZwb3JuZzAwZXMyeW1qM3V5OTAyMnEifQ.pVEGIeip9T4nE7H-NTyh0g';
  var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/martinuswaag/ciuds6yxn009a2ips6x62gfer',
      zoom: 6,
      center:[5.3770023,52.1626588],
      minZoom: 4,
  });

  map.on('load', function() {
    map.addSource("events", {
        type: "geojson",
        data: "http://localhost:8888/events/api"
    });

    // Use the stores source to create five layers:
    // One for unclustered points, three for each cluster category,
    // and one for cluster labels.
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
}

