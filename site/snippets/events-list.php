<?php

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

if ($countryFilter) {
  $items = $items->filterBy('country', $countryFilter, ',');
}

$items = $items->limit(30)

?>
<div class="event__list">

  <header class="blog__header">
    <h1 class="alpha">Upcoming events</h1>
  </header>

  <div class="agenda__preview full__width">
    
    <?php foreach($items as $item): ?>
    <a href="<?php echo $item->url() ?>" class="agenda__preview__item event__info list">
      
      <h4><?php echo $item->title() ?></h4>
      
      <p class="agenda__intro"><?php echo $item->introsentence() ?></p>
      
      <ul class="event__info">
        
        <li>
          <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
          <time datetime="<?php echo $page->date('c') ?>"><?php echo $item->date('d-m-Y') ?></time>
        </li>

        <li>
          <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
          <?php echo $item->city().', '.$item->country() ?>
        </li>

      </ul>

    </a>
    <?php endforeach ?>

    <nav class="list__navigation">

      <a class="btn" href="archive">Past events</a>

    </nav>

  </div>

</div>
