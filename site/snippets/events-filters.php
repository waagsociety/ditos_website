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
$viewParameter = param('view', 'map');
$countryParameter  = param('country');
$categoryParameter = param('category');
?>

<form id="filter-events"> 
  
  <nav class="tabs">
  <?php foreach (['Map', 'List'] as $name): $slug = slugify($name) ?> 
    
    <?php $selected = $slug === $viewParameter ?>
    <label class="btn<?php e($selected, ' is-active')?>">
      <input type="radio" name="view" value="<?php echo $slug ?>"<?php e($selected, ' checked')?>>
      <?php echo $name ?>
    </label>

  <?php endforeach ?>
  </nav>

  <div class="events__filters full__width">
  <?php $countries = $page->children()->visible()->pluck('country', ',', true) ?>
  <label class="form__select">
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
  <?php echo 'var $view = "'.$viewParameter.'";' ?>
  <?php echo 'var $country = "'.$countryParameter.'";' ?>

  var form = document.getElementById('filter-events')
  var fields = Array.prototype.slice.call(form.querySelectorAll('[name]'))
  var parameters = null
  
  form.onchange = function(event) {
    parameters = fields.reduce(function(result, element) {    
      const isCheck = typeof element.checked === 'boolean'
      if (isCheck ? element.checked : !!element.value){ 
        result.push(element.name + ':' + element.value)
      }
      return result
    }, []).join('/')
    location = $url + parameters
  }

}()
</script>
