<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <?php snippet('blog-preview') ?>
      <div class="text left">
        <?php echo $page->text()->kirbytext() ?>
      </div>
      <?php snippet('newsletter') ?>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
      <?php snippet('events-featured') ?>
    </aside>
  </div>
  <?php snippet('partners') ?>
  <?php snippet('social-stream') ?>
</main>

<?php snippet('footer') ?>
