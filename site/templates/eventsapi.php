<?php

// if(!r::ajax()) go(url('error'));

header('Content-Type: application/vnd.geo+json; charset=utf-8');
$data = $pages->find('events')->children()->visible()->flip()->paginate(10);
$features = array();

foreach($data as $article) {
  $location = $pages->find('locations')->find($article->location());
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


echo json_encode($geojson);

?>
