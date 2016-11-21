<?php
$tagsParameter = param('tagged');
$items = $page->children()->visible();

if ($tagsParameter) {
  $items = $items->filterBy('tags', $tagsParameter, ',');
}
$items = $items->paginate(6);
?>

<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <div class="blog__preview left">
        <h1 class="preview__header"><?php echo $page->title() ?>
          <?php if ($tagsParameter) : ?>
           
          <a class="btn" href="<?= $page->url() ?>">
            #<?= $tagsParameter ?>
            <svg width="24" height="24"><use xlink:href="#i:close"/></svg>            
          </a>
          <?php endif ?>
        </h1>
        <?php e($page->description(), $page->description()->kirbytext()) ?>
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
        <?php if($items->pagination()->hasPages()): ?>
          <nav class="pagination">
            <?php if($items->pagination()->hasNextPage()): ?>
            <a class="btn btn-3 left" href="<?php echo $items->pagination()->nextPageURL() ?>">‹ Previous</a>
            <?php endif ?>
            <?php if($items->pagination()->hasPrevPage()): ?>
            <a class="btn btn-3 right" href="<?php echo $items->pagination()->prevPageURL() ?>">Next ›</a>
            <?php endif ?>
          </nav>
        <?php endif ?>
      </div>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('social-stream') ?>
</main>
<?php snippet('footer') ?>
