<header class="blog__header">
  
  <?php $postimage = $page->postimage() ?>
  <?php if (strlen($postimage) > 0) : foreach($page->images($postimage) as $file): ?>        
  <figure>
    <img src="<?php echo $file->url() ?>" width="100%" />
    <?php if (strlen($file->copyright()) > 0) : ?>
    <figcaption>
      &copy; <?php echo $file->copyright() ?>
    </figcaption>
    <?php endif ?>
  </figure>
  <?php endforeach; endif; ?>
  
  <h1><?php echo $page->title() ?></h1>

</header>