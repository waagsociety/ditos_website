<?php 
if (param('format') === 'ics') : ?>
  <?php snippet('ics', ['event' => $page]) ?>
<?php else : ?>
  <?php snippet('header') ?>
  <main class="main__content">
    <div class="flex flex__wrap">
      <section>
        <?php snippet('item-header') ?>
        <div class="text">
          <?php echo kirbytext($page->text()) ?>
        </div>
      </section>
      <aside>
        <?php snippet('event-information') ?>
      </aside>
    </div>
  </main>
  <?php snippet('footer') ?>

<?php endif ?>
