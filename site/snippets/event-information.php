<?php $render = new Render ?>
<header>
  <h3 class="alpha">Event information</h3>
</header>

<ul class="event__details full">
  
  <?php $partner = $pages->find('about/partners')->find($page->partner()) ?>
  <?php if ($partner) : ?>
  <?php $logo = $partner->image($partner->logo()) ?>
  <li class="logo">
  
    <a href="<?= $site->url().'/about/partners/'.$partner->slug() ?>">
      <img src="<?= $logo->url() ?>" width="<?= $logo->width() ?>" height="<?= $logo->height() ?>">
    </a>

  </li>
  <? endif ?>

  <?php $activity = $pages->find('activities')->find($page->activity()) ?>
  <?php $tags = explode(',', $page->tags()) ?>
  <?php if ($activity) : ?>
  <li>
    <header>What</header>
    <?php echo $activity->title() ?>
    <?php if (count($tags)) : ?>
    <ul class="tags">
      <?php foreach ($tags as $value) : ?>
      <li><a href="">#<?= $value ?></a>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </li>
  <?php endif ?>

  <li>
    <header>When</header>
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
  
  <?php $location = $pages->find('locations')->find($page->location()) ?>
  <?php if ($location) : ?>
  <?php $q = $location->address().'+'.$location->city().'+'.$location->country() ?> 
  <li>
    <header>
      <!-- <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg> -->
      Where
    </header>       
    <?php echo $location->title()?><br>
    <?php echo $location->address() ?><br>
    <?php echo $location->city().', '.$location->country() ?>

    <a href="http://maps.google.com/?q=<?php echo $q ?>" target="_blank">
      <button type="button">View in Google Maps</button>
    </a>

  </li>
  <?php endif ?>


  <?php $links = $page->link()->toStructure() ?>
  <?php if (count($links)) : ?>
  <li>
    <?php foreach ($links as $link) : ?>
      <a class="btn" href="<?=  $link->url() ?>"><?= $link->label() ?></a>
    <?php endforeach ?>
  </li>
  <?php endif ?>

</ul>
