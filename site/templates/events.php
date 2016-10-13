<?php
  $country  = param('country');
  $category = param('category');
?>
<?php snippet('header') ?>
<main class="main__content">
  
  <div class="flex flex__wrap" id="list">
 
    <section>
<<<<<<< HEAD

      <div id="map" hidden></div>
      
      <div class="event__list">
      <?php snippet('events-list') ?>
      </div>

=======
      <?php snippet('mapbox') ?>
>>>>>>> origin/master
    </section>

    <aside><?php snippet('events-filters') ?></aside>  
    
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
