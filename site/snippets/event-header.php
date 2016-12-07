<header class="blog__header">
  
  <?php snippet('figure', ['image' => $page->postimage()]) ?>

  <h1><?php echo $page->title() ?></h1>
  
  <?php
    $author = $page->author();
    $date = $page->date();
    $tags = !!trim($page->tags()) ? explode(',', $page->tags()) : false;
  ?>
</header>
