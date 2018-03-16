<?php
/* just a standard select field, but with some extra javascript glue */
class DoaselectField extends BaseField {

  public function __construct() {

    $this->type    = 'doaselect';
    $this->options = array();
    $this->icon    = 'chevron-down';

  }

  public function options() {
    return FieldOptions::build($this);
  }

  public function option($value, $text, $selected = false) {
    return new Brick('option', $this->i18n($text), array(
      'value'    => $value,
      'selected' => $selected
    ));
  }

  //override body to append extra stuff
  public function content()
  {
      $content = parent::content();
      //add the script inline instead of above, because otherwise it won't work the first time
      $js = <<<JAVASCRIPT
console.log("yo");
var eventTypes = ["Workshops","Workshops","Workshops","Workshops","Interactive Travelling Exhibition","Workshops","Conference / Seminar","Conference / Seminar","Workshops","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Workshops","Interactive Travelling Exhibition","Workshops","Conference / Seminar","Conference / Seminar","Online activities","Interactive Travelling Exhibition","Workshops","Online activities","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Workshops","Delegations visits","Online activities","Workshops","Workshops","Workshops","Workshops","Workshops","Science Cafes / Public Screenings","Workshops","Online activities","Workshops","Workshops","Workshops","Online activities","Science Cafes / Public Screenings","Online activities","Online activities","Online activities","Workshops","Workshops","Science Cafes / Public Screenings","Workshops","Interactive Travelling Exhibition","Workshops","Workshops","Science Cafes / Public Screenings","Conference / Seminar","Conference / Seminar","Workshops","Interactive Travelling Exhibition","Workshops","Online activities","Science Cafes / Public Screenings","Interactive Travelling Exhibition","Science Cafes / Public Screenings","Science Cafes / Public Screenings","Workshops","Online activities","Workshops","Workshops","Interactive Travelling Exhibition","Interactive Travelling Exhibition","Conference / Seminar","Delegations visits","Interactive Travelling Exhibition","Online activities","Science Cafes / Public Screenings","Workshops","Online activities","Interactive Travelling Exhibition","Online activities","Online activities","Interactive Travelling Exhibition"];

var workpackages = ["1","1","1","1","1","2","1","1","1","1","1","3","2","2","2","3","1","2","2","1","1","2","2","3","4","1","1","2","2","2","2","2","2","3","4","4","4","1","3","3","1","3","3","1","3","4","2","1","1","1","4","1","4","2","2","3","2","3","2","1","4","2","2","2","2","3","","","","","","","3","2","1","2","2"];

function registerNameChange()
{
    var nameField = $('#form-field-event_name')[0];
    var wpField = $('#form-field-work_package')[0];
    var typeField = $('#form-field-activity')[0];

    nameField.addEventListener("change", function() {

        var index = nameField.selectedIndex - 1;//the first value is a label, not a value
        
        //update the two readonly fields via the mapping
        if(index > -1){
           
            //parse the wp number
            var wp = parseInt(workpackages[index]);
            var wp_index = -1;//the default empty value
            if(!isNaN(wp)){
                wp_index = wp - 1;//index starts at 0     
            }
            wpField.value = wp_index;
            
            var eventType = eventTypes[index];
            typeField.value = eventType;
        }
        else //the empty selector
        {
            wpField.value = "";
            typeField.value = "";
        }
    });
}

$(function() {//document ready
    registerNameChange();
    console.log("registered");
});
JAVASCRIPT;

      $content->append("<script>" . $js . "</script>");
      return $content;
  } 

  public function input() {

    $select = new Brick('select');
    $select->addClass('selectbox');
    $select->attr(array(
      'name'         => $this->name(),
      'id'           => $this->id(),
      'required'     => $this->required(),
      'autocomplete' => $this->autocomplete(),
      'autofocus'    => $this->autofocus(),
      'readonly'     => $this->readonly(),
      'disabled'     => $this->disabled(),
    ));

    $default = $this->default();

    if(!$this->required()) {
      $select->append($this->option('', '', $this->value() == ''));
    }

    if($this->readonly()) {
      $select->attr('tabindex', '-1');
    }

    foreach($this->options() as $value => $text) {
        $select->append($this->option($value, $text, $this->value() == $value));
    }

    $inner = new Brick('div');
    $inner->addClass('selectbox-wrapper');
    $inner->append($select);


    $wrapper = new Brick('div');
    $wrapper->addClass('input input-with-selectbox');
    $wrapper->append($inner);
    
    if($this->readonly()) {
      $wrapper->addClass('input-is-readonly');
    } else {
      $wrapper->attr('data-focus', 'true');
    }

    return $wrapper;

  }

  public function validate() {
    return array_key_exists($this->value(), $this->options());
  }

}
