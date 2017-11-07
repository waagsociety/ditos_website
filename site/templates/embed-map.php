<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $site->title(); ?></title>
  <style type="text/css">
  * {
    margin: 0;
    height: 100%;
    width: 100%;
    outline: 0;
    border: none;
  }
  body {
    overflow: hidden;
  }
  </style>
</head>
<body>
  <iframe width="100%" height="100%" src="<?php echo $page->source(); ?>">
</body>
</html>
