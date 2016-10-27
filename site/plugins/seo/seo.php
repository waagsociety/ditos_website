<?php
require_once __DIR__ . DS . 'core' . DS . 'core.php';

$kirby->set('field', 'seo',  __DIR__ . DS . 'fields' . DS . 'seo');
$kirby->set('field', 'seoarchive',  __DIR__ . DS . 'fields' . DS . 'seoarchive');

// Main seo function
function seo($type, $data = array(), $return = false) {
	$page = page();
	$controller = SeoCore::panel( $page );
	$content = $controller[$type]['full-replaced'];

	if( $return !== false ) {
		echo $content;
	} else {
		$html = '';
		$html['title'] = '<title>' . $content . '</title>' . "\n";
		$html['description'] = ( ! empty( $content ) ) ?  '<meta name="description" content="' . $content . '">' . "\n" : '';
		return $html[$type];
	}
}