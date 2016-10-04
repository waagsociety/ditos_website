<?php snippet('header') ?>
<?php 
  $db = c::get('db');
  $table = $db->table('event');
  $results = $table->all();
?>

<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <div id="map"></div>
      <div class="text">
  <?php foreach($results as $row) {
      echo kirbytext($row->description());
    }
  ?>
</div>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>

  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
