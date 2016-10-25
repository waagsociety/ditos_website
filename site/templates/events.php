<?php snippet('header') ?>
<?php
function slugify($string) {
  $string = trim($string);
  $string = preg_replace('/\W+/', '-', $string);
  $string = strtolower($string);
  return $string;
}

$pageParam = param('page', 1);
$pageInArchive = $pageParam < 0;

$viewIndex = ['List', 'Map'];
$viewParameter = param('view', 'map');

$countryIndex = $page->children()->visible()->pluck('country', ',', true);
$countryParameter = param('country');
$countryFilter = false;

// 
if ($countryParameter) foreach ($countryIndex as $country) {
  if (slugify($country) === $countryParameter) {
    $countryFilter = $country;
    break;
  }
}

$activityIndex = $page->children()->visible()->pluck('activity', ',', true);

$activityParameter = param('activity');
$activityFilter = false;

if ($activityParameter) foreach ($activityIndex as $activity) {
  if (slugify($activity) === $activityParameter) {
    $activityFilter = $activity;
    break;
  }
}

if ($pageInArchive) {
  $items = $pages->find('events')->children()->visible()->filter(function($child){
    return time() > strtotime($child->date_end('c'));
  })->sortBy('date', 'desc');
}
else {
  $items = $pages->find('events')->children()->visible()->filter(function($child){
    return time() < strtotime($child->date_end('c'));
  })->sortBy('date', 'asc');
}

if ($countryFilter) $items = $items->filterBy('country', $countryFilter, ',');
if ($activityFilter) $items = $items->filterBy('activity', $activityFilter, ',');

$itemsPerPage = $viewParameter === 'map' ? 1000 : 24;
$itemCount = count($items);
$pageCount = ceil($itemCount / $itemsPerPage);

$pagination = [
  'active' => $pageParam,
  'archive' => $pageInArchive,
  'itemsPerPage' => $itemsPerPage,
  'itemCount' => $itemCount,
  'pageCount' => $pageCount
];

$end = ceil(abs($pageParam) * $itemsPerPage);
$start = ($end - $itemsPerPage);

$items = $items->slice($start, $itemsPerPage);

?>

<main class="main__content">

  <div class="flex flex__wrap">

    <section>
    <?php 
    $viewParameter === 'map' 
      ? snippet('mapbox', ['items' => $items]) 
      : snippet('events-list', ['items' => $items, 'pagination' => $pagination]) 
    ?>
    </section>

    <aside class="filter__events"><?php snippet('events-filters', ['pagination' => $pagination]) ?></aside>  
    
  </div>
</main>
<?php snippet('footer') ?>
