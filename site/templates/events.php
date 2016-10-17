<?php snippet('header') ?>

<main class="main__content">
  
  <div class="flex flex__wrap">
 
    <section>

      <?php $view = param('view', 'map') ?>
      <?php $view === 'map' ? snippet('mapbox') : snippet('events-list') ?>

    </section>

    <aside class="filter__events"><?php snippet('events-filters') ?></aside>  
    
  </div>
</main>
<?php snippet('footer') ?>
