<?php
$eventArchive = $page->uri() === 'events/archive';

$pageParameter = param('page', 1);
$itemsPerPage = 8;
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
    <?php $activity = $pages->find('activities')->find($item->activity()) ?>

    <a href="<?php echo $item->url() ?>" class="agenda__preview__item event__info list">

    <?php $postimage = strlen($item->postimage()) > 0
      ? $item->postimage()->toFile()
      : $site->find('about')->find('partners')->find($item->partner())->postimage()->toFile()
    ?>
      <?php if ($postimage) : ?>
      <figure>
        <img src="<?php echo thumb($postimage, array('width' => 480, 'quality' => 70))->url() ?>" width="240px" />
      </figure>
      <?php endif ?>
      <div>
        
        <h4><?php echo $item->title() ?></h4>   
      <p class="agenda__intro"><?php echo $item->description() ?></p>      
      <ul class="event__info">
        
        <li>
          <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
          <time datetime="<?php echo $page->date('c') ?>"><?php echo $item->date('d-m-Y') ?></time>
        </li>

        <?php if ($location) : ?> 
        <li>
          <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
          <?php echo $location->title().', '.$location->country() ?>
        </li>
        <?php endif ?>

        <?php if ($activity) : ?>
        <li>
          <svg viewBox="0 0 32 32"><use xlink:href="#i:activity"/></svg>
          <?php echo $activity->title() ?>
        </li>
        <?php endif ?>

      </ul>
      </div>
    </a>
    <?php endforeach ?>

    <?php if (!$itemCount) : ?>
    <div class="agenda__preview__item event__info list">
      <h1>There seem to be no <?= $eventArchive ? 'past' : 'upcoming' ?> events.</h1>
    </div>
    <?php endif ?>

    <?php if($items->pagination()->hasPages()): ?>
    <nav class="pagination">

      <?php if($items->pagination()->hasPrevPage()): ?>
      <a class="prev btn" href="<?php echo $items->pagination()->prevPageURL() ?>">&lsaquo; Previous</a>
      <?php endif ?>

      <?php if($items->pagination()->hasNextPage()): ?>
      <a class="next btn" href="<?php echo $items->pagination()->nextPageURL() ?>">Next &rsaquo;</a>
      <?php endif ?>

    </nav>
    <?php endif ?>

  </div>

</div>
