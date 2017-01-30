<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('panel.stylesheet', 'assets/css/panel.css');
c::set('debug', true);

/*

---------------------------------------
Plugin: autoid
---------------------------------------
See https://github.com/helllicht/kirby-autoid

*/

c::set('autoid.type', 'hash');

c::set('panel.widgets', array(
  'pages'    => true,
  'meta' => true,
  'history'  => true,
  'account'  => true,
  'about'     => true,
  'site'     => true,
));
