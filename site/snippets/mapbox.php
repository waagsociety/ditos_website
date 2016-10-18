<div id="map"></div>
<script>
// geojson API Object
<?php

// $data = $pages->find('events')->children()->visible()->flip()->paginate(10);
$data = $items;
$features = array();

foreach($data as $article) {
  $features[] = array(
    'type'  => 'Feature',
    'properties' => array(
      'url'   => (string)$article->url(),
      'title' => (string)$article->title(),
      'introsentence'  => (string)$article->introsentence(),
      'date'  => (string)$article->date('d.m.Y'),
      'time'  => (string)$article->time(),
      'address'  => (string)$article->address()
    ),
    'geometry' => array(
      'type'   => 'Point',
      'coordinates' => array(
        floatval(explode(",",(string)$article->location())[1]),
        floatval(explode(",",(string)$article->location())[0])
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
