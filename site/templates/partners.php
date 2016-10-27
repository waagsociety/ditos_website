<?php snippet('header') ?>
<main class="main__content">

  <div class="flex flex__wrap">
    <section>
      <?php snippet('item-header') ?>
      <div class="text">
        <?php echo kirbytext($page->text()) ?>
      </div>
      <ul class="partners">
      <?php foreach($page->children() as $partner) : ?>
        <?php $logo = $partner->image($partner->logo()) ?>
        <li>
          <a href="<?php echo $partner->url() ?>">
            <figure>
              <img src="<?php echo $logo->url() ?>" width="<?php echo $logo->width() ?>"  height="<?php echo $logo->height() ?>" alt="<?php echo $partner->title() ?> logo">
            </figure>
            <h1><?php echo $partner->title() ?></h1>
            <p><?php echo $partner->description() ?></p>
          </a>
        </li>
      <?php endforeach ?>
      </ul>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
