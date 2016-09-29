<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <?php if($results->count() > 0): ?>
      <ul class="search__results">
        <?php foreach($results as $result): ?>
          <a href="<?php echo $result->url() ?>" class="result">
            <h2><?php echo $result->title()->html() ?></h2>
            <p><?php echo $result->text()->html() ?></p>
          </a>
        <?php endforeach ?>
      </ul>
      <?php else : ?>
      <section class="no__results">
        <h1 class="gamma"><i class="fa fa-search" aria-hidden="true"></i> We couldnt find any search results, maybe try another search keyword.</h1>
        <?php snippet('search') ?>
      </section>
      <?php endif ?>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
</main>
<?php snippet('footer') ?>
