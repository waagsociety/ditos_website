<nav class="primary-nav">
 
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

    <?php foreach($pages->visible() as $p): ?>
      <li><a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
    <?php endforeach ?>

    <li class="busbtn">
      <a href="<?php echo url('book-the-bus'); ?>" class="icon labeled">
        <svg width="32" height="32"><use xlink:href="#i:bus"/></svg>
        Request the science bus
      </a>
    </li>

  </ul>

</nav>

<nav class="secondary-nav">
  <?php if($page->submenu() == '1'): ?>
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
  <?php endif ?>
  <?php snippet('social-bar') ?>
  <?php snippet('search') ?>
</nav>



