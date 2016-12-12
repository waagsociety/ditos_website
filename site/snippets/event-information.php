<header>
 <h3 class="alpha">Event information</h3>
</header>

<ul class="event__details full">

 <?php $partner = $pages->find('about/partners')->find($page->partner()) ?>
 
 <?php if($partner) : ?>
   <?php $logo = $partner->image($partner->logo()) ?>
   <li class="logo">
     <a href="<?= $site->url().'/about/partners/'.$partner->slug() ?>">
       <img src="<?= $logo->url() ?>" width="<?= $logo->width() ?>" height="<?= $logo->height() ?>">
     </a>
   </li>
 <?php endif ?>

 <?php $activity = $pages->find('activities')->find($page->activity()) ?>

 <?php $tags = $tags = !!trim($page->tags()) ? explode(',', $page->tags()) : []; ?>
 <?php if ($activity) : ?>
  <li>
    <header>What</header>
    <section>
      <!-- ACTIVITY -->
      <?php echo $activity->title() ?>
   
      <!-- TAGS -->
      <?php if (count($tags) > 0) : ?>
        <ul class="tags">
          <?php foreach($tags as $tag) : ?>
          <li><a href="./tagged:<?= $tag ?>">#<?= $tag ?></a>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
      
      <!-- ADMISSION -->
      <?php $currency = ['gbp'=>'£', 'eur'=>'€', 'pln'=>'zł', 'chf'=>'Fr. '][trim($page->currency()->html())] ?>
      <p><?= ($page->price()->isNotEmpty() ? 'Admission fee: '.$currency.$page->price() : 'No admission fee') ?></p>

      <!-- RSVP -->
      <?php $links = $page->link()->toStructure() ?>
      <?php foreach ($links as $link) : ?>
        <a href="<?=  $link->url() ?>">
          <button type="button" class="btn-1"><?= $link->label() ?></button>
        </a>
      <?php endforeach ?>

    </section>
  </li>
 <?php endif ?>

 <li>
   <header>When</header>
   <section>
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
        <?php if ($date_end_time) : ?>
          <?php echo date('l d.m.Y', $date_end_time).' at ' ?>
          <?php echo $time_end ?>
        <?php endif ?>
      </time>
     <?php endif ?>
     <a href="<?php echo $page->url() ?>/format:ics/">
       <button type="button" class="btn-1">Add to Calendar</button>
     </a>
   </section>
 </li>

 <?php $location = $pages->find('locations')->find($page->location()) ?>
 <?php if ($location) : ?>
 <?php $q = $location->address().'+'.$location->city().'+'.$location->country() ?>
 <li>
   <header>
     <!-- <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg> -->
     Where
   </header>
   <section>
     <?php echo $location->title()?><br>
     <?php echo $location->address() ?><br>
     <?php echo $location->city().', '.$location->country() ?>

     <a href="http://maps.google.com/?q=<?php echo $q ?>" target="_blank">
       <button type="button" class="btn-1">View in Google Maps</button>
     </a>
     </section>
 </li>
 <?php endif ?>

</ul>
