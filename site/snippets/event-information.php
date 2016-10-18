<header>
  <h3 class="alpha">Event information</h3>
</header>

<ul class="event__details full">
  
  <li>
    <header>
      <svg viewBox="0 0 32 32"><use xlink:href="#i:organisation"/></svg>
      Who
    </header>
    <p>De Waag</p>
  </li>

  <li>
    <header>
      <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
      What
    </header>
    <?php echo $page->activity() ?>
  </li>

  <li>
    <header>
      <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg>
      When
    </header>
    <time datetime="<?php echo $page->date('c') ?>">
      <?php echo $page->date('l d.m.Y') ?> from <?php echo $page->time() ?>
      <?php if (strlen($page->time_end()) > 0) echo 'to '.$page->time_end() ?>
    </time>
    <a href="">
      <button type="button">Add to Calendar</button>
    </a>
  </li>

  <li>
    <header>
      <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
      Where
    </header>
    <?php $q = $page->address().' '.$page->city().' '.$page->country() ?>    
    <?php if (strlen($page->venue()->html()) > 0) { 
      echo $page->venue().'<br>';
    } ?>
    <?php echo $page->address() ?><br>
    <?php echo $page->city().', '.$page->country() ?>
    <br>
    <a href="http://maps.google.com/?q=<?php echo $q ?>" target="_blank">
      <button type="button">View in Google Maps</button>
    </a>
  </li>

</ul>