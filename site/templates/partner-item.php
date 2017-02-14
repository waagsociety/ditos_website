<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section class="main-section">
      <?php snippet('partner-header') ?>
      <div class="text">
        <?php echo kirbytext($page->text()) ?>
      </div>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>