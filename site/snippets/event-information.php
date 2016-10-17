<header>
  <h3 class="alpha">Event information</h3>
</header>

<ul class="event__details full">
  
  <li>
    <h1>Host</h1>
    <p>De Waag</p>
  </li>

  <li>
    <svg viewBox="0 0 32 32"><use xlink:href="#i:calendar"/></svg> 
    <time datetime="<?php echo $page->date('c') ?>">
      <?php echo $page->date('d-m-Y') ?>      
    </time>
    <br>
    <a href="http://maps.google.com/?q=<?php echo $q ?>" target="_blank">
      <button type="button">Add to Calendar</button>
    </a>
  </li>

  <li>
    <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg>
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