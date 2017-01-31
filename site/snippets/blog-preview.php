<?php $items = $pages->children()->visible()->sortBy('modified', 'desc')->limit(4); ?>
<div class="blog__preview left">
  <?php foreach($items as $item): ?>
    <a href="<?php echo $item->url() ?>" class="article__preview">
      <article>
        <header>  
          <h3><?php echo $item->title() ?></h3>
          <p><?php echo $item->description() ?></p>
        </header>
        <div class="bg" style="background-image: url(<?php echo $item->contentURL() ?>/<?php echo $item->postimage() ?>)"></div>
      </article>
    </a>
  <?php endforeach ?>
</div>
