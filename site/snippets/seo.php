
  <?php if($page->seotitle()->isNotEmpty()): ?>
    <meta property="og:title" content="<?php echo $page->seotitle()->html() ?>" />
  <? else: ?>
    <meta property="og:title" content="<?php echo $page->title()->html() ?>" />
  <?php endif ?>
  <meta property="og:url" content="<?php echo $page->url() ?>" />
  
  <?php if($page->postimage()->isNotEmpty()): ?>
    <meta property="og:image" content="<?php echo $page->postimage() ?>" />
  <? else: ?>
    <meta property="og:image" content="aap.jpg" />
  <?php endif ?>


<meta property="og:site_name" content="<?php echo $site->title()->html() ?>" />
