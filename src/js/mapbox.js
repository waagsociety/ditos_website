mapboxgl.accessToken = 'pk.eyJ1IjoibWFydGlud2FhZyIsImEiOiJjaWo0NWt6ZWYwMDE0dXlrcm0yenVkNDR5In0.0I9xJzLubP9g3V_NTt1PhA';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v9',
    zoom: 5,
    center:[5.3770023,52.1626588]
});

map.scrollZoom.disable();
