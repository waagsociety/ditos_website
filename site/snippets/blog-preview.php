<?php $items = $pages->find('blog')->children()->limit(4); ?>
<div class="blog__preview left">
  <h3 class="preview__header">Latest <a href="#">blogs</a></h3>
  <?php foreach($items as $item): ?>
    <a href="<?php echo $item->url() ?>" class="article__preview">
      <article>
        <header>  
          <h3><?php echo $item->title() ?></h3>
          <p><?php echo $item->introsentence() ?></p>
        </header>
        <div class="bg" style="background-image: url(<?php echo $item->contentURL() ?>/<?php echo $item->postimage() ?>)"></div>
      </article>
    </a>
  <?php endforeach ?>
</div>
