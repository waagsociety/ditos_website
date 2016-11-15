<?php
$eventArchive = $page->uri() === 'events/archive';

$pageParameter = param('page', 1);
$itemsPerPage = 2;
$itemCount = count($items);
$pageCount = ceil(count($items) / $itemsPerPage);

$items = $items->paginate($itemsPerPage);
?>
<div class="event__list">

  <header class="blog__header">
    <h1 class="alpha"><?= $page->title() ?></h1>
  </header>


  <div class="agenda__preview full__width">
    <?php foreach($items as $item): ?>
    <?php $location = $pages->find('locations')->find($item->location()) ?>

    <a href="<?php echo $item->url() ?>" class="agenda__preview__item event__info list">
      <h4><?php echo $item->title() ?></h4>      
      <p class="agenda__intro"><?php echo $item->description() ?></p>      
      <ul class="event__info">
        
        <li>
          <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
          <time datetime="<?php echo $page->date('c') ?>"><?php echo $item->date('d-m-Y') ?></time>
        </li>

        <li>
          <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
          <?php echo $location->city().', '.$location->country() ?>
        </li>

      </ul>

    </a>
    <?php endforeach ?>

    <?php if (!$itemCount) : ?>
    <div class="agenda__preview__item event__info list">
      <h1>There seem to be no <?= $eventArchive ? 'past' : 'upcoming' ?> events.</h1>
    </div>
    <?php endif ?>

    <?php if($items->pagination()->hasPages()): ?>
    <nav class="pagination">

      <?php if($items->pagination()->hasNextPage()): ?>
      <a class="next btn" href="<?php echo $items->pagination()->nextPageURL() ?>">Next &rsaquo;</a>
      <?php endif ?>

      <?php if($items->pagination()->hasPrevPage()): ?>
      <a class="prev btn" href="<?php echo $items->pagination()->prevPageURL() ?>">&lsaquo; Previous</a>
      <?php endif ?>

    </nav>
    <?php endif ?>

  </div>

</div>
