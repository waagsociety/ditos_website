<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php snippet('seo') ?>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Fjord+One" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.26.0/mapbox-gl.css' rel='stylesheet' />
  <link rel="canonical" href="<?= $page->url() ?>">
  <link rel="alternate" hreflang="en" href="en" />
  <?php echo css('assets/css/main.css') ?>
</head>
<body>
<header class="auto-hide-header">
  <?php snippet('menu') ?>
</header>
