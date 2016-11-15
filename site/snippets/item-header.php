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
    $created = $page->created();
    $tags = !!trim($page->tags()) ? explode(',', $page->tags()) : false;
  ?>
  <?php if ($author || $created || $tags) : ?>
  <section class="metadata">

    <?php e($author, '<p>'.$author.'</p>') ?>
    <?php e($created, '<time>'.date('d-m-Y', strtotime($created)).'</time>') ?>
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
