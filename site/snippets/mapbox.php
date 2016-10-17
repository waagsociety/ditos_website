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
      'text'  => (string)$article->text(),
      'date'  => (string)$article->date()
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
