<?php $hasHeaderImage = $page->postimage()->isNotEmpty() ?>

<header class="blog__header <?php e($hasHeaderImage, 'header_has_an_image') ?>">
  <?php snippet('figure', ['image' => $page->postimage(), 'title' => $page->title()]) ?>
  
  <?php
    $author = $page->author();
    $date = $page->date();
    $tags = !!trim($page->tags()) ? explode(',', $page->tags()) : false;
  ?>

</header>
