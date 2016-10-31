<?php
return array(
  'title' => 'Meta data',
  'html' => function() {
    return tpl::load(__DIR__ . DS . 'template.php', array(
      'meta' => panel()->site()->index()->find('locations', 'activities', 'about/partners'),
    ));
  }
);
