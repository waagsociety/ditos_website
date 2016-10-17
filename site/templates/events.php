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
$countryFilter = false;
foreach ($countryIndex as $country) {
  if (slugify($country) === $countryParameter) {
    $countryFilter = $country;
    break;
  }
}

$items = $pages->find('events')->children()->visible();

if ($countryFilter) $items = $items->filterBy('country', $countryFilter, ',');

$items = $items->limit(30);

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
