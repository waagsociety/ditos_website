<?php $meta = getMeta($site, $page); ?>
<title><?= $meta['title'] ?></title>
<meta name="description" content="<?= $meta['desc'] ?>">
<meta property="og:title" content="<?= $meta['title'] ?>" />
<meta property="og:image" content="<?= $meta['image'] ?>" />
<meta property="og:type" content="<?= $meta['type'] ?>" />
<meta property="og:description" content="<?= $meta['desc'] ?>">
<meta itemprop="name" content="<?= $meta['title'] ?>">
<meta itemprop="description" content="<?= $meta['desc'] ?>">
