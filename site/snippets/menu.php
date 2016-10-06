<nav class="primary-nav">
  <a href="#navigation" class="nav-trigger">
    <span>
      <em aria-hidden="true"></em>
    </span>
  </a> <!-- .nav-trigger -->
  <ul id="navigation">
    <li><a href="<?php echo url('/'); ?>" class="logo"><img src="<?php echo url('assets/images/logo.gif') ?>" alt="Logo"></a></li>
    <?php foreach($pages->visible() as $p): ?>
      <li><a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
    <?php endforeach ?>
    <li class="busbtn"><a href="<?php echo url('contact'); ?>"><i class="fa fa-bus" aria-hidden="true"></i> Request the science bus</a>
  </ul>
</nav> <!-- .primary-nav -->
<nav class="secondary-nav">
  <ul class="social__bar">
    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
  </ul>
  <?php snippet('search') ?>
</nav> <!-- .secondary-nav -->



