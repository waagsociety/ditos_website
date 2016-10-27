<meta property="og:site_name" content="<?php echo $site->title()->html() ?>" />
<?php if($page->seotitle()->isNotEmpty()): ?>
  <meta property="og:title" content="<?php echo $page->seotitle()->html() ?>" />
<? else: ?>
  <meta property="og:title" content="<?php echo $page->title()->html() ?>" />
<?php endif ?>
<meta property="og:url" content="<?php echo $page->url() ?>" />

<?php if($page->postimage()->isNotEmpty()): ?>
  <?php $postimage = $page->postimage()->toFile() ?>
  <meta property="og:image" content="<?php echo $postimage->url() ?>" />
<? else: ?>
  <meta property="og:image" content="<?php echo url('assets/images/a.jpg') ?>" />
<?php endif ?>
