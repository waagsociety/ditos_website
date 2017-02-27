<?php snippet('header') ?>
<?php

function slugify($string) {
  $string = trim($string);
  $string = preg_replace('/\W+/', '-', $string);
  $string = strtolower($string);
  return $string;
}

$itemsPerPage = 8;
$viewParameter = param('view', 'events-list');
$eventArchive = $page->uri() === 'events/archive';

$countryParameter = param('country');
$activityParameter = param('activity');
$tagsParameter = param('tagged');

$pageParameter = param('page', 1);

$items = $pages->find('events')->children()->visible();
?>
<script type="text/javascript">
  console.log('raw', <?= json_encode($items->toArray()) ?>)
</script>
<?php
if ($eventArchive) {
  $items = $items->filter(function($child){
    $enddate = $child->date_end('c');
    $enddateday = strtotime($enddate) + 86400; 

    return time() > $enddateday;
  })->sortBy('date', 'desc');
}

else {
  $items = $items->filter(function($child){
    $enddate = $child->date_end('c');
    $enddateday = strtotime($enddate) + 86400; 
    return time() <= $enddateday;
  })->sortBy('date', 'asc');
}
?>
<script type="text/javascript">
  console.log('time', <?= json_encode($items->toArray()) ?>)
</script>
<?php
if ($tagsParameter) {
  $items = $items->filterBy('tags', $tagsParameter, ',');
}
?>
<script type="text/javascript">
  console.log('tags', <?= json_encode($items->toArray()) ?>)
</script>
<?php
if ($activityParameter) {
  $items = $items->filter(function($item) use ($activityParameter) {
    return $item->activity() == $activityParameter;
  });
}
?>
<script type="text/javascript">
  console.log('activityParameter', <?= json_encode($items->toArray()) ?>)
</script>
<?php

if ($countryParameter) {
  $locations = $pages->find('locations')->children();
  $items = $items->filter(function($item) use ($countryParameter, $locations) {
    $country = $locations->find($item->location())->country();
    return $countryParameter == slugify($country);
  });
}

?>

<script type="text/javascript">
  console.log(<?= json_encode($items->toArray()) ?>)
</script>

<?php
// filter out events without a valid location, activity, or partner
$locations = $pages->find('locations')->children();
$activities = $pages->find('activities')->children();
$partners = $pages->find('about')->children()->find('partners');
$items->filter(function($item) use ($locations, $activities, $partners) {
  return $locations->find($item->location())
   && $activities->find($item->activity())
   && $partners->find($item->partner());
});
?>
<script type="text/javascript">
  console.log(<?= json_encode($locations->toArray()) ?>)
  console.log(<?= json_encode($activities->toArray()) ?>)
  console.log(<?= json_encode($partners->toArray()) ?>)
  console.log(<?= json_encode($items->toArray()) ?>)
</script>
<main class="main__content">
  <div class="flex flex__wrap">
    <section class="main-section">
      <?php $viewParameter === 'map' 
        ? snippet('mapbox', ['items' => $items]) 
        : snippet('events-list', ['items' => $items]) 
      ?>
    </section>
    <aside class="filter__events"><?php snippet('events-filters') ?></aside>  
  </div>
</main>
<?php snippet('footer') ?>
