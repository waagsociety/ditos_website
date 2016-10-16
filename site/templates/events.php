<?php snippet('header') ?>

<main class="main__content">
  
  <div class="flex flex__wrap">
 
    <section>

      <?php $view = param('view', 'map') ?>
      <?php $view === 'map' ? snippet('mapbox') : snippet('events-list') ?>

    </section>

    <aside><?php snippet('events-filters') ?></aside>  
    
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
