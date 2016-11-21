<?php 
  $items = $pages->find('events')->children()->visible()->filter(function($child){
    return time() < strtotime($child->date_end('c'));
  })->sortBy('date', 'asc')->limit(3);
?>

<header>
  <h3 class="alpha">Upcoming events</h3>
</header>

<div class="agenda__preview full__width">
  
  <?php foreach($items as $item): ?>
    <a href="<?php echo $item->url() ?>" class="agenda__preview__item event__info">
      <div>
        <h4><?php echo $item->title() ?></h4>
        <p class="agenda__intro"><?php echo $item->description() ?></p>
        
        <ul class="event__info">
          
          <li>
            <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
            <time datetime="<?php echo $item->date('c') ?>"><?php echo $item->date('d.m.Y') ?></time>
          </li>

          <li>
            <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
            <?php echo $item->city().', '.$item->country() ?>
          </li>
        </ul>
      </div>
    </a>
  <?php endforeach ?>

</div>
