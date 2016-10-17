<?php snippet('header') ?>
<?php 
function slugify($string) {
  $string = trim($string);
  $string = preg_replace('/\W+/', '-', $string);
  $string = strtolower($string);
  return $string;
}

$viewIndex = ['List', 'Map'];
$viewParameter = param('view', 'map');

$countryIndex = $page->children()->visible()->pluck('country', ',', true);
$countryParameter = param('country');

$categoryParameter = param('category');
?>

<main class="main__content">
  
  <div class="flex flex__wrap">
 
    <section>
    <?php $viewParameter === 'map' ? snippet('mapbox') : snippet('events-list') ?>
    </section>

    <aside class="filter__events"><?php snippet('events-filters') ?></aside>  
    
  </div>
</main>
<?php snippet('footer') ?>
