<?php
return array(
  'title' => 'Site Information',
  'html' => function() {
    return tpl::load(__DIR__ . DS . 'template.php', array(
      'meta' => panel()->site()->index()->find('locations')->children()
    ));
  }
);
