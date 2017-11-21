<?php 
if (param('format') === 'ics') : ?>
  <?php snippet('ics') ?>
<?php else : ?>
  <?php snippet('header') ?>
  <main class="main__content">
    <div class="flex flex__wrap">
      <section class="main-section">
        <?php snippet('event-header') ?>
        <div class="text">
          <?php echo kirbytext($page->text()) ?>
          <?php snippet('disqus') ?>
        </div>
      </section>
      <aside>
        <?php snippet('event-information') ?>
      </aside>
    </div>
  </main>
  <?php snippet('footer') ?>

<?php endif ?>
