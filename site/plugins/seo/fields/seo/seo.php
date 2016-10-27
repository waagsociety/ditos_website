<?php
class SeoField extends BaseField {
	static public $fieldname = 'seo';
	static public $assets = array( 'js' => array( 'script.js' ), 'css' => array( 'style.css' ) );

	public function input() {
		if( class_exists('SeoCore') ) {
			// Set page
			$page = $this->page();

			// Load language file
			SeoCore::loadLanguage();

			// Load main snippet
			$html = SeoCore::snippet('main', $data = array(
				'controller' => SeoCore::panel($this->page(), $this),
				'field' => $this,
				'page' => $this->page()
			));

			return $html;
		} else {
			return l::get('plugin.required','Seo plugin is required!');
		}
	}

	// Connecting PHP to Javascript
	public function element() {
		$element = parent::element();
		$element->data('field', self::$fieldname);
		return $element;
	}
}