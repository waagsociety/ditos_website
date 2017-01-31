<?php

class TabField extends BaseField
  {
  static public $assets = array(
    'css' => array(
      'tab.css'
    ),
    'js' => array(
      'tab.js'
    )
  );

  public function result() {
    return null;
  }

  public function label() {
    return null;
  }

  public function content() {
    return '<h2 class="tab-title" data-tab-id="'.html($this->id).'" data-tab-icon="'.html($this->icon).'" data-field="tabfield">'.html($this->label).'</h2>';
  }

  public function element() {
    $element = parent::element();
    $element->addClass('field-with-tab-title');
    return $element;
  }

}

?>
