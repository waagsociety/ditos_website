<nav class="primary-nav">

    <div class="mobile">
      <a href="<?php echo url('/'); ?>" class="logo mobile">
        <?php snippet('logo-animation') ?>
      </a>
    </div>

  <a href="#navigation" class="nav-trigger">
    <span>
      <em aria-hidden="true"></em>
    </span>
  </a>

  <ul id="navigation">
    <li>
      <a href="<?php echo url('/'); ?>" class="logo">
        <?php snippet('logo-animation') ?>
      </a>
    </li>


    <!-- <div class="button-bar">
      <li class="busbtn mailbtn">
        <a href="#mc_embed_signup" class="icon labeled">
          <svg width="32" height="32"><use xlink:href="#i:mail"/></svg>
          Join the mailing
        </a>
      </li>

      <li class="busbtn">
        <a href="<?php echo url('book-the-bus'); ?>" class="icon labeled">
          <svg width="32" height="32"><use xlink:href="#i:bus"/></svg>
          Request the bus
        </a>
      </li>
    </div> -->

    <div class="button-bar">


      <?php snippet('social-bar') ?>
      <li class="busbtn mailbtn">
        <a href="<?php echo url('/#mc_embed_signup'); ?>" class="has-icon">
          <svg width="32" height="32"><use xlink:href="#i:mail"/></svg>
          <span>Join the mailing</span>
        </a>
      </li>
    </div>

    <div class="mobile">
      <?php snippet('social-bar') ?>
    </div>
  </ul>

</nav>

<nav class="secondary-nav">
  <ul class="subnav__list">
    <?php foreach($pages->visible() as $p): ?>
      <li><a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
    <?php endforeach ?>
  </ul>

    <?php if($user = $site->user()): ?>
      <a href="/panel/pages/<?php echo $page->uri() ?>/edit" class="editpage">
        Edit page
      </a>
    <?php endif ?>
  <?php snippet('search') ?>
</nav>


  <?php if($page->submenu() == '1' || $page->parent()->submenu() == '1'): ?>
    <nav class="sub-menu">
    <?php

    $items = false;

    // get the open item on the first level
    if($root = $pages->findOpen()) {

      // get visible children for the root item
      $items = $root->children()->visible();
    }

    // only show the menu if items are available
    if($items and $items->count()):

    ?>

    <ul class="subnav__list">
      <?php foreach($items as $item): ?>
      <li <?php e($item->isOpen(), ' class="active"') ?>><a<?php e($item->isOpen(), ' class="active"') ?> href="<?php echo $item->url() ?>"><?php echo $item->title()->html() ?></a></li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </nav>
  <?php endif ?>
