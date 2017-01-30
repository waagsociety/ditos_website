<header class="blog__header">
  
  <?php snippet('figure', ['image' => $page->postimage()]) ?>

  <h1><?= $page->title() ?></h1>

  <?php $logo = $page->file($page->logo()) ?>
  <?php if ($logo->exists()) : ?>
    <img class="logo" src="<?= $logo->url() ?>" width="500"/>
  <?php endif ?>
  
</header>
