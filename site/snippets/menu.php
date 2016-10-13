<nav class="primary-nav">
 
  <a href="#navigation" class="nav-trigger">
    <span>
      <em aria-hidden="true"></em>
    </span>
  </a>

  <ul id="navigation">
    
    <li>
      <a href="<?php echo url('/'); ?>" class="logo">
        <img src="<?php echo url('assets/images/logo.gif') ?>" alt="Logo">
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
  <?php snippet('social-bar') ?>
  <?php snippet('search') ?>
</nav>



