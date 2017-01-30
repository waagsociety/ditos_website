<?php $hasHeaderImage = $page->file($page->postimage())->exists() ?>

<header class="blog__header <?php e($hasHeaderImage, 'header_has_an_image') ?>">
  
  <?php snippet('figure', ['image' => $page->postimage(), 'title' => $page->title()]) ?>
  
  <?php
    $author = $page->author();
    $date = $page->date();
    $tags = !!trim($page->tags()) ? explode(',', $page->tags()) : false;
  ?>
  
</header>

<?php if ($author || $date || $tags) : ?>
  <section class="metadata">    
    <p>
      By <?= $author ?>
      on <?php e($date, '<time>'.date('d-m-Y', $date).'</time>') ?>    
    </p>
    <?php if ($tags && count($tags)) : ?>
    <ul class="tags">
      <?php foreach ($tags as $tag) : ?>
      <li><a href="./tagged:<?= $tag ?>">#<?= $tag ?></a>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </section>
  <?php endif ?>