<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section class="main-section">
      <?php snippet('standard-header') ?>
      <ul class="partner-list">
      <?php foreach($page->children() as $partner) : ?>
        <?php $logo = $partner->image($partner->logo()) ?>
        <li>
          <a href="<?php echo $partner->url() ?>">
            <?php if($logo) : ?>
              <figure class="logo partner">
                <img src="<?php echo $logo->url() ?>" width="<?php echo $logo->width() ?>"  height="<?php echo $logo->height() ?>" alt="<?php echo $partner->title() ?> logo">
              </figure>
            <?php endif ?>
            <div class="inner">
              <h1><?php echo $partner->title() ?></h1>
              <p><?php echo $partner->description() ?></p>
            </div>
          </a>
        </li>
      <?php endforeach ?>
      </ul>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('eu-bar') ?>
</main>
<?php snippet('footer') ?>
