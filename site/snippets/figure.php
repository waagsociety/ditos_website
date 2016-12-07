<?php 
// $image should be passed as the second argument of the snippet method
$image = $image ? $image->toFile() : false;

$licenseIndex = [
  'CC0' => [
    'title' => 'Public Domain',
    'href' => 'https://creativecommons.org/publicdomain/zero/1.0/'
  ],
  'BY' => [
    'title' => 'Attribution required',
    'href' => 'https://creativecommons.org/licenses/by/2.0/'
  ],
];

if ($image) : ?>
  
  <?php

    $url = $image->url();
    $width = $image->width();
    $height = $image->height();
    $caption = $image->caption()->isNotEmpty() ? $image->caption() : null;
    $author = $image->copyright();

    $licenseValue = trim($image->license()->html());
    $licenseKey = strlen($licenseValue) > 0 ? $licenseValue : 'CC0';
    $license = $licenseIndex[$licenseKey];

  ?>

  <figure>

    <img src="<?= $url ?>" width="<?= $width ?>" height="<?= $height ?>">
    
    <footer>
      <a class="license <?= $licenseKey ?>" href="<?= $license['href'] ?>" title="License: <?= $license['title'] ?>" target="_blank">
        <svg viewBox="5.5 -3.5 64 64" height="24"><use xlink:href="#i:<?= $licenseKey ?>"/></svg>
        <span><?= $license['title'] ?></span>
      </a>
      <?= $author->html() ?>
    </footer>

    <?php if (false || $caption) : ?>
    <figcaption><?= $caption->kirbytext() ?></figcaption>
    <?php endif ?>

  </figure>

<?php endif ?>
