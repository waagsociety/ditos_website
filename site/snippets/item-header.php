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
  
  <?php
    $author = $page->author();
    $date = $page->date();
    $tags = !!trim($page->tags()) ? explode(',', $page->tags()) : false;
  ?>
  <?php if ($author || $date || $tags) : ?>
  <section class="metadata">
    
    <?php if ($author || $date) : ?>
    <p><?php e($author, $author) ?>
    <?php e($date, '<time>on '.date('d-m-Y', $date).'</time>') ?>
    </p>
    <?php endif ?>
    <?php if ($tags && count($tags)) : ?>
    <ul class="tags">
      <?php foreach ($tags as $tag) : ?>
      <li><a href="./tagged:<?= $tag ?>">#<?= $tag ?></a>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </section>
  <?php endif ?>

</header>
