<?php 
function slugify($string) {
  $string = trim($string);
  $string = preg_replace('/\W+/', '-', $string);
  $string = strtolower($string);
  return $string;
}
?>
<?php
  $url = $page->url();
  $parameters = param();
  //print_r($parameters);
  $countryParameter  = param('country');
  $categoryParameter = param('category');
?>
<?php $items = $pages->find('events')->children()->visible()->limit(3); ?>

<header class="events__filters">
  <nav class="tabs">
    <button>Map</button>
    <button>List</button>
  </nav>
</header>

<form id="filter-events" class="events__filters full__width">
  
  <?php $countries = $page->children()->visible()->pluck('country', ',', true) ?>
  <?php //print_r($countries) ?>
  <?php foreach($countries as $key => $country): ?>
    <?php echo $slug ?>
  <?php endforeach ?> 
  <label>
    Where
    <select name="country">
      <option value="">Everywhere</option>
      <optgroup label="Filter by country">
      <?php foreach($countries as $country): $slug = slugify($country); ?>
      <?php $selected = ($slug === $countryParameter ? 'selected' : '') ?>
      <option value="<?php echo $slug ?>" <?php echo $selected ?>>
        <?php echo $country ?>
      </option>
      <?php endforeach ?>
      </optgroup>
    </select>
  </label>

</form>
<script type="text/javascript">
!function() {

  <?php echo 'var $url = "'.$url.'/";' ?>
  <?php echo 'var $country = "'.$countryParameter.'";' ?>

  var form = document.getElementById('filter-events')
  var fields = Array.prototype.slice.call(form.querySelectorAll('[name]'))
  var parameters = null
  
  form.onchange = function(event) {
    parameters = fields.reduce(function(result, element) {      
      if (element.value) result += element.name + ':' + element.value
      return result
    }, "")
    location = $url + parameters
  }

}()
</script>
