<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <header class="blog__header">
        <figure>
          <img src="<?php echo $page->contentURL() ?>/<?php echo $page->postimage() ?>" />
          <figcaption><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo $page->imagecopy() ?></figcaption>
        </figure>
        <h1><?php echo $page->title() ?></h1>
      </header>
      <div class="text">
        <?php echo kirbytext($page->text()) ?>
        <?php snippet('disqus') ?>
      </div>
    </section>
    <aside>
      <header>
        <h3 class="alpha">Upcoming events near you</h3>
      </header>
      <ul class="agenda__preview full__width">
        <li class="agenda__preview__item">
          <h4>Wat gaan we doen</h4>
          <p class="agenda__intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec neque a erat commodo facilisis.</p>
          <ul class="event__info">
            <span><i class="fa fa-calendar" aria-hidden="true"></i> 18-09-2016</span>
            <span><i class="fa fa-map-marker" aria-hidden="true"></i> Amsterdam</span>
            <span><i class="fa fa-building-o" aria-hidden="true"></i> Waag Society</span>
          </ul>
        </li>
        <li class="agenda__preview__item">
          <h4>Wat gaan we doen</h4>
          <p class="agenda__intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec neque a erat commodo facilisis.</p>
          <ul class="event__info">
            <span><i class="fa fa-calendar" aria-hidden="true"></i> 18-09-2016</span>
            <span><i class="fa fa-map-marker" aria-hidden="true"></i> Amsterdam</span>
            <span><i class="fa fa-building-o" aria-hidden="true"></i> Waag Society</span>
          </ul>
        </li>
        <li class="agenda__preview__item">
          <h4>Wat gaan we doen</h4>
          <p class="agenda__intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec neque a erat commodo facilisis.</p>
          <ul class="event__info">
            <span><i class="fa fa-calendar" aria-hidden="true"></i> 18-09-2016</span>
            <span><i class="fa fa-map-marker" aria-hidden="true"></i> Amsterdam</span>
            <span><i class="fa fa-building-o" aria-hidden="true"></i> Waag Society</span>
          </ul>
        </li>
      </ul>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
