<header>
  <h3 class="alpha">Event information</h3>
</header>

<ul class="event__details full">
    
  <li>
    <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
    <time datetime="<?php echo $page->date('c') ?>">
      <?php echo $page->date('d-m-Y') ?>      
    </time>
  </li>

  <li>
    <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
    <?php if (strlen($page->venue()->html()) > 0) { 
      echo $page->venue()->html().'<br>';
    } ?>
    <?php echo $page->address() ?><br>
    <?php echo $page->city().'<br>'.$page->country() ?>
  </li>

</ul>