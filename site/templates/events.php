<?php snippet('header') ?>
<?php

$itemsPerPage = 2;
$viewParameter = param('view', 'map');
$eventArchive = $page->uri() === 'events/archive';

if ($eventArchive) {
  $items = $pages->find('events')->children()->visible()->filter(function($child){
    return time() > strtotime($child->date_end('c'));
  })->sortBy('date', 'desc');
}
else {
  $items = $pages->find('events')->children()->visible()->filter(function($child){
    return time() < strtotime($child->date_end('c'));
  })->sortBy('date', 'asc');
}

if ($viewParameter !== 'map') {
  $itemCount = count($items);
  $pageCount = ceil(count($items) / $itemsPerPage);
  $pageParameter = param('page', 1);
}

?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <?php 
      $viewParameter === 'map' 
        ? snippet('mapbox', ['items' => $items]) 
        : snippet('events-list', ['items' => $items]) 
      ?>
    </section>
    <aside class="filter__events"><?php snippet('events-filters') ?></aside>  
  </div>
</main>
<?php snippet('footer') ?>
