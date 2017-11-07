<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><? $site->title() ?></title>
  <style type="text/css">
  * {
    margin: 0;
    height: 100%;
    width: 100%;
    outline: 0;
    border: none;
  }
  </style>
</head>
<body>
  <iframe width="100%" height="100%" src="<? echo $page->source() ?>">
</body>
</html>
<? print_r($page) ?>
