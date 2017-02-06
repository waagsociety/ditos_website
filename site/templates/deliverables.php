<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section class="main-section">
      <?php $items = $pages->find('about/deliverables')->children()->visible()->paginate(6); ?>
      <div class="blog__preview left">
        <h3 class="preview__header">Project deliverables</h3>
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
        <?php if($items->pagination()->hasPages()): ?>
          <nav class="pagination">
            <?php if($items->pagination()->hasNextPage()): ?>
            <a class="btn btn-3 left" href="<?php echo $items->pagination()->nextPageURL() ?>">Oudere artikelen</a>
            <?php endif ?>
            <?php if($items->pagination()->hasPrevPage()): ?>
            <a class="btn btn-3 right" href="<?php echo $items->pagination()->prevPageURL() ?>">Nieuwere artikelen</a>
            <?php endif ?>
          </nav>
        <?php endif ?>
      </div>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
