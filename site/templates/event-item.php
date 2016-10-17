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
      <header>
        <h3 class="alpha">Event information</h3>
      </header>
    </aside>
  </div>
</main>
<?php snippet('footer') ?>
