<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section class="main-section">
      <?php snippet('item-header') ?>
      <div class="text">
        <?php echo kirbytext($page->text()) ?>
        <?php snippet('disqus') ?>
      </div>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
</main>
<?php snippet('footer') ?>
