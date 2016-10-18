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
      <svg viewBox="0 0 32 32"><use xlink:href="#i:activity"/></svg>
      What
    </header>
    <?php echo $page->activity() ?>
  </li>

  <li>
    <header>
      <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg>
      When
    </header>
    <?php
      $date = $page->date('l d.m.Y');
      $time = $page->time();
      
      $date_end = $page->date_end();
      $date_end = str_replace('-', '/', $date_end);
      $date_end_time = strtotime($date_end);
      $date_end = date('Y-m-d', $date_end_time);
      $date_end = $date_end == $page->date('Y-m-d') ? null : $date_end;

      $time_end = strlen($page->time_end()) > 0 ? $page->time_end() : null;
    ?>
    <time datetime="<?php echo $page->date('c').' '.$time ?>">
      <?php echo $date ?> at <?php echo $time ?>
    </time>
    <?php if ($date_end || $time_end) : ?>
      to
      <time>
        <?php if ($date_end) { echo date('l d.m.Y', $date_end_time).' at '; } ?> 
        <?php echo $time_end ?>
      </time>
    <?php endif ?>
    <a href="<?php echo $page->url() ?>/format:ics/">
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