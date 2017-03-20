<?php $items = $pages->find('blog')->children()->visible()->sortBy('modified', 'desc')->limit(4); ?>
<div class="blog__preview left">
  <h2><a href="/blog">Latest news</a></h2>
  <?php foreach($items as $item): ?>
    <a href="<?php echo $item->url() ?>" class="article__preview">
      <article>
        <div class="bg" style="background-image: url(<?php echo $item->contentURL() ?>/<?php echo $item->postimage() ?>)"></div>
        <header>  
          <h3><?php echo $item->title() ?></h3>
          <p><?php echo $item->description() ?></p>
        </header>
      </article>
    </a>
  <?php endforeach ?>
</div>
