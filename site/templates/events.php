<?php snippet('header') ?>
<?php

$itemsPerPage = 2;
$viewParameter = param('view', 'events-list');
$eventArchive = $page->uri() === 'events/archive';
$tagsParameter = param('tagged');
$pageParameter = param('page', 1);

if ($eventArchive) {
  $items = $pages->find('events')->children()->visible()->filter(function($child){

    $enddate = $child->date_end('c');
    $enddateday = strtotime($enddate) + 86400; 

    return time() > $enddateday;
  })->sortBy('date', 'desc');
}
else {
  $items = $pages->find('events')->children()->visible()->filter(function($child){
    $enddate = $child->date_end('c');
    $enddateday = strtotime($enddate) + 86400; 
    return time() <= $enddateday;
  })->sortBy('date', 'asc');
}



if ($tagsParameter) {
  $items = $items->filterBy('tags', $tagsParameter, ',');
}
?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <?php $viewParameter === 'map' 
        ? snippet('mapbox', ['items' => $items]) 
        : snippet('events-list', ['items' => $items]) 
      ?>
    </section>
    <aside class="filter__events"><?php snippet('events-filters') ?></aside>  
  </div>
</main>
<?php snippet('footer') ?>
