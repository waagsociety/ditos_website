<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <header class="blog__header">
        <figure>
          <img src="<?php echo url('assets/images/photo.jpg') ?>" />
          <figcaption><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo $page->imagecopy() ?></figcaption>
        </figure>
        <h1><?php echo $page->title() ?></h1>
      </header>
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
