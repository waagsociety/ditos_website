<header class="blog__header">
  
  <?php $postfile = $page->postimage()->toFile() ?>
  
  <figure>
    <img src="<?php echo $postfile->url() ?>" width="100%" />
    <?php if (strlen($postfile->copyright()) > 0) : ?>
      <figcaption>
        &copy; <?php echo $postfile->copyright() ?>
      </figcaption>
    <?php endif ?>
  </figure>

  <h1><?php echo $page->title() ?></h1>

</header>
