function loadMapbox(){
  mapboxgl.accessToken = 'pk.eyJ1IjoibWFydGludXN3YWFnIiwiYSI6ImNpdGZwb3JuZzAwZXMyeW1qM3V5OTAyMnEifQ.pVEGIeip9T4nE7H-NTyh0g';

  var map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/martinuswaag/ciuds6yxn009a2ips6x62gfer',
      zoom: 6,
      center:[5.3770023,52.1626588],
      minZoom: 4,
      maxZoom: 15,
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

  // When a click event occurs near a place, open a popup at the location of
  // the feature, with description HTML from its properties.
  map.on('click', function (e) {
    var features = map.queryRenderedFeatures(e.point, { layers: ['markers'] });

    if (!features.length) {
        return;
    }



    var feature = features[0];
    
    // Populate the popup and set its coordinates
    // based on the feature found.
    var popup = new mapboxgl.Popup({
      closeButton: false
    })
    .setLngLat(feature.geometry.coordinates)
    .setHTML(
      `<div class="pop_up">
        <div class="main__pop">
          <h2>${feature.properties.title}</h2>
          <p>${feature.properties.introsentence}</p>
        </div>
        <div class="popup">
          <ul class="popup event details clearfix">
            <li class="left"><svg viewBox="0 0 32 32"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#i:calendar"></use></svg> <br/> ${feature.properties.date} ${feature.properties.time}</li>
            <li class="left"><svg viewBox="0 0 32 32"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#i:location"></use></svg> <br/> ${feature.properties.address}</li>
          </ul>
        </div>
        <footer>
          <a href="${feature.properties.url}">View</a>
        </footer>
      </div>`
    )
    .addTo(map);

  });

  // Use the same approach as above to indicate that the symbols are clickable
  // by changing the cursor style to 'pointer'.
  map.on('mousemove', function (e) {
    var features = map.queryRenderedFeatures(e.point, { layers: ['markers'] });
    map.getCanvas().style.cursor = (features.length) ? 'pointer' : '';
  });

  map.addControl(new mapboxgl.NavigationControl());
}

