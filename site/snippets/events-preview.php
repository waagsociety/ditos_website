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
        <span>
          <i class="fa fa-calendar" aria-hidden="true"></i> 
          <time datetime="<?php echo $page->date('c') ?>"><?php echo $item->date('d/m/Y') ?></time> 
          <time><?php echo $item->time() ?></time>
        </span>
      </li>
      <li>
        <span><i class="fa fa-map-marker" aria-hidden="true"></i> Amsterdam</span>
      </li>
      <li>
        <span><i class="fa fa-building-o" aria-hidden="true"></i> Waag Society</span>
      </li>
    </ul>
  </a>
  <?php endforeach ?>
</div>
