<div id="map"></div>
<script>
// geojson API Object
<?php

// $data = $pages->find('events')->children()->visible()->flip()->paginate(10);
$data = $items;
$features = array();

foreach($data as $article) {
  $location = $pages->find('locations')->find($article->location());
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
        floatval(explode(",",(string)$location->location())[1]),
        floatval(explode(",",(string)$location->location())[0])
      )
    )
  );
}

$geojson = array(
  'type' => 'FeatureCollection',
  'features' => $features
);


echo 'var geojson = '.json_encode($geojson).';';

?>
</script>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) {
    loadMapbox();
  });
</script>
