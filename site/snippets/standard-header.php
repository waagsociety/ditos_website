<header class="blog__header">
  <?php $postimage = $page->postimage()->toFile() ?>
  <?php if ($postimage) : ?>
  <figure>
    <img src="<?php echo $postimage->url() ?>" width="100%" />
    <?php if (strlen($postimage->copyright()) > 0) : ?>
      <figcaption>
        &copy; <?php echo $postimage->copyright() ?>
      </figcaption>
    <?php endif ?>
  </figure>
  <?php endif ?>
  <h1><?php echo $page->title() ?></h1>
</header>
