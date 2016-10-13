<?php snippet('header') ?>
<main class="main__content">
  
  <div class="flex flex__wrap" id="list">
 
    <section>

      <?php snippet('mapbox') ?>
      
      <div class="event__list">
      <?php snippet('events-list') ?>
      </div>

    </section>

    <aside><?php snippet('events-filters') ?></aside>  
    
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
