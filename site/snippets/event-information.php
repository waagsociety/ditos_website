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
      <time>
      <?php $dateEnd = strtotime($page->date_end('Y.m.d')) ?>        
      <?php if ($dateEnd === $page->date() || strlen($page->date_end()) < 1) : ?>

        <?= date('l d-m-Y', $page->date()) ?>

        <?php if (strlen($page->time_end()) > 0) : ?> 
          from <?= $page->time() ?> to <?= $page->time_end() ?>
        <?php else : ?>
          at <?= $page->time() ?>
        <?php endif ?>

      <?php else : ?>
        
        <?= date('l d-m-Y', $page->date()) ?>
        at <?= $page->time() ?>
        to <?= date('l d-m-Y', $dateEnd) ?>

        <?php if ($page->time_end()) : ?> 
        at <?= $page->time_end() ?>
        <?php else : ?>
          
        <?php endif ?>

      <?php endif ?>
      </time>
      <a href="<?php echo $page->url() ?>/format:ics/">
        <button type="button" class="btn-1">Add to Calendar</button>
      </a>
    </section>
  </li>

 <?php $location = $pages->find('locations')->find($page->location()) ?>
 <?php if ($location) : ?>
 <?php $q = strtolower(trim(join(' ', [$location->address(), $location->country()]))) ?>
 <li>
   <header>
     <!-- <svg viewBox="0 0 32 32"><use xlink:href="#i:location"/></svg> -->
     Where
   </header>
   <section>
     <?php echo $location->title()?><br>
     <?php e(strlen($location->address()) > 0, $location->address().'<br>') ?>
     <?php echo $location->country() ?>

     <a href="http://maps.google.com/?q=<?php echo $q ?>" target="_blank">
       <button type="button" class="btn-1">View in Google Maps</button>
     </a>
     </section>
 </li>
 <?php endif ?>

</ul>
