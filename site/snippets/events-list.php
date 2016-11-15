<div class="event__list">

  <header class="blog__header">
    <h1 class="alpha"><?= $page->title() ?></h1>
  </header>

  <div class="agenda__preview full__width">
    <?php foreach($items as $item): ?>
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
          <?php echo $item->city().', '.$item->country() ?>
        </li>

      </ul>

    </a>
    <?php endforeach ?>

    <?php if (!count($items)) : ?>
    <div class="agenda__preview__item event__info list">
      <h1>It seems there are no <?php echo $pagination['archive'] ? 'past' : 'upcoming' ?>&nbsp;events.</h1>
    </div>
    <?php endif ?>

  </div>

</div>
