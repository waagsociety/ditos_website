<header>
  <h3 class="alpha">Event information</h3>
</header>

<ul class="event__details">
    
  <li>
    <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
    <time datetime="<?php echo $page->date('c') ?>">
      <?php echo $page->date('d-m-Y') ?>      
    </time>
  </li>

  <li>
    <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
    <?php echo $page->city().', '.$page->country() ?>
  </li>

</ul>