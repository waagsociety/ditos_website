
<h2 class="left"><a href="/about"><?php echo $page->abouttitle() ?></a></h2>
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
