<?php $items = $pages->find('events')->children()->visible()->limit(3); ?>
<header>
  <h3 class="alpha">Upcoming events</h3>
</header>
<div class="agenda__preview full__width">
  <?php foreach($items as $item): ?>
  <a href="<?php echo $item->url() ?>" class="agenda__preview__item event__info">
    <h4><?php echo $item->title() ?></h4>
    <p class="agenda__intro"><?php echo $item->introsentence() ?></p>
    <ul class="event__info">
      <li>
        <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
        <time datetime="<?php echo $page->date('c') ?>">
          <?php echo $item->date('d/m/Y') ?> 
          <?php echo $item->time() ?>
        </time>
      </li>
      <li>
        <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
        Amsterdam
      </li>
      <li>
        <svg viewBox="0 0 32 32"><use xlink:href="#i:organisation"/></svg> 
        Waag Society
      </li>
    </ul>
  </a>
  <?php endforeach ?>
</div>
