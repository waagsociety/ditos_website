<?php

define('DS', DIRECTORY_SEPARATOR);

// load kirby
require(__DIR__ . DS . 'kirby' . DS . 'bootstrap.php');

// check for a custom site.php
if(file_exists(__DIR__ . DS . 'site.php')) {
  require(__DIR__ . DS . 'site.php');
} else {
  $kirby = kirby();
}

class Render {

  private function attribute($properties) {
    $attributes = [];
    foreach ($properties as $key => $value) {
      array_push($attributes, $key.'="'.$value.'"');
    }
    return ' '.join(' ', $attributes);
  }

  public function element($contents) {

    $nodes = [];
    $count = count($contents);
    if ($count) {
      
      $tagName = $contents[0];
      $emptyElement = true;
      $attributes = [];
      $childNodes = [];
      array_push($nodes, '&lt;', $tagName);
      
      foreach (array_slice($contents, 1) as $key => $value) {
        
        if (is_string($key)) {
          $attributes[$key] = $value;
        }
        else {
          $emptyElement = false;
          if (is_array($value)) {
            array_push($childNodes, $this->element($value));
          }
          else if (is_string($value)) {
            array_push($childNodes, $value);
          }
        } 

      }

      array_push($nodes, $this->attribute($attributes), '>');
      if (!$emptyElement) {
        array_push($nodes, join(' ', $childNodes), '&lt;/', $tagName, '>');
      }

    }

    return join('', $nodes);

  }

  public function html(...$contents) { 
    
    $nodes = [];
    foreach ($contents as $value) {
      if (is_array($value)) array_push($nodes, $this->element($value));
      else if (is_string($value)) array_push($nodes, $value);
    }

    return join(' ', $nodes);

  }

}

// $render = new Render;

// render
echo $kirby->launch();