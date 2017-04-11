
  <h2><?php echo $page->abouttitle() ?></h2>
<section class="about-section">
  <div class="inner">
    <div class="content">
      <?php echo $page->abouttext()->kt() ?>
    </div>
      <figure style="background-image: url(<?= $page->contentURL() ?>/<?php echo $page->aboutimage() ?>)">
        <img src="<?= $page->contentURL() ?>/<?php echo $page->aboutimage() ?>" />
      </figure>
  </div>
</section>
