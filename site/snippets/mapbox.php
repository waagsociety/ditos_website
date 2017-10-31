<div id="map"></div>
<script>
// geojson API Object
<?php

$data = $items;
$features = array();

foreach($data as $article) {
  $location = $pages->find('locations')->find($article->location());
  if ($location) {
    if ($location->location() != ",") {
      $coords = explode(",", $location->location());
      $features[] = array(
        'type'  => 'Feature',
        'properties' => array(
          'url'   => (string)$article->url(),
          'title' => (string)$article->title(),
          'introsentence'  => (string)$article->description(),
          'date'  => (string)$article->date('d.m.Y'),
          'time'  => (string)$article->time(),
          'address'  => (string)$location->title()
        ),
        'geometry' => array(
          'type'   => 'Point',
          'coordinates' => array(
            floatval($coords[1]),
            floatval($coords[0])
          )
        )
      );
    }
    else echo 'console.warn("location ‘'.$article->location().'’ for event ‘'.$article->title().'’ has no coordinates");';
  }
  else echo 'console.warn("location ‘'.$article->location().'’ for event ‘'.$article->title().'’ does not exist");';
}

$geojson = array(
  'type' => 'FeatureCollection',
  'features' => $features
);

echo 'var geojson = '.json_encode($geojson).';';

?>
</script>
<script type="text/javascript">
  // geojson.features = geojson.features.filter(function(feature) { 
  //   var coords = feature.geometry.coordinates
  //   if (!coords[0] && !coords[1]) {
  //     console.warn('no coordinates for location ‘' + feature.properties.address + '’ at ‘' + feature.properties.title + '’')
  //   }
  //   return coords[0] || coords[1]
  // })
  
  console.info(JSON.stringify(geojson, null, 2))
  document.addEventListener("DOMContentLoaded", function(event) {
    loadMapbox();
  });
</script>
