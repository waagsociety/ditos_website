<?php $items = $pages->find('blog', 'about/deliverables')->children()->visible()->sortBy('modified', 'desc')->limit(4); ?>
<div class="blog__preview left">
  <h3 class="preview__header">Latest <a href="<?php echo url('/blog'); ?>">blogs</a> <a href="<?php echo url('/experiments'); ?>">experiments</a></h3>
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
