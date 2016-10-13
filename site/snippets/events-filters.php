<?php 
function slugify($string) {
  $string = trim($string);
  $string = preg_replace('/\W+/', '-', $string);
  $string = strtolower($string);
  return $string;
}
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
    <?php $slug = slugify($country) ?><br>
  <?php endforeach ?> 
  <br><br>
  <label>
    Where
    <select name="country">
      <option value="" selected>Everywhere</option>
      <optgroup label="Filter by country">
      <?php foreach($countries as $country): ?>
      <option value="<?php echo slugify($country) ?>"><?php echo $country ?></option>
      <?php endforeach ?>
      </optgroup>
    </select>
  </label>

</form>
<script type="text/javascript">
!function() {

  var form = document.getElementById('filter-events')
  var fields = Array.prototype.slice.call(form.querySelectorAll('[name]'))
  var parameters = null
  
  form.onchange = function(event) {
    parameters = fields.reduce(function(result, element) {      
      result[element.name] = element.value
      return result
    }, {})
    console.log(parameters)
  }

}()
</script>
