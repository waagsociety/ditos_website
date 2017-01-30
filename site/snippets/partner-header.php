<?php $hasHeaderImage = $page->file($page->postimage())->exists() ?>

<header class="blog__header <?php e($hasHeaderImage, 'header_has_an_image') ?>">
   
  <?php snippet('figure', ['image' => $page->postimage(), 'title' => $page->title()]) ?>

</header>

<?php $logo = $page->file($page->logo()) ?>
<?php if ($logo->exists()) : ?>
  <header><img class="logo" src="<?= $logo->url() ?>" width="500"/></header>
<?php endif ?>