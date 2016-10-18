<?php 

$url = $page->url();

$viewIndex = ['Map', 'List'];
$viewParameter = param('view', 'map');
$countryParameter = param('country');
$activityParameter = param('activity');

?>
<form id="filter-events"> 
  
  <nav class="tabs">

  <?php foreach ($viewIndex as $name): $slug = slugify($name) ?> 
    
    <?php $selected = $slug === $viewParameter ?>
    <label class="btn<?php e($selected, ' is-active')?>">
      <input type="radio" name="view" value="<?php echo $slug ?>"<?php e($selected, ' checked')?>>
      <?php echo $name ?>
    </label>

  <?php endforeach ?>
  </nav>

  <div class="events__filters full__width">
  <?php $countryIndex = $page->children()->visible()->pluck('country', ',', true) ?>
  <label class="form__select">
    Where
    <select name="country">

      <option value="">Everywhere</option>

      <optgroup label="Filter by country">
      <?php foreach($countryIndex as $country): $slug = slugify($country); ?>
      
        <?php $selected = ($slug === $countryParameter ? 'selected' : '') ?>
        <option label="<?php echo $country ?>" value="<?php echo $slug ?>" <?php echo $selected ?>>
          <?php echo $country ?>
        </option>
      
      <?php endforeach ?>
      </optgroup>

    </select>

  </label>

  <?php $activityIndex = $page->children()->visible()->pluck('activity', ',', true) ?>
  <label class="form__select">
    What
    <select name="activity">

      <option value="">Everything</option>

      <optgroup label="Filter by activity">
      <?php foreach($activityIndex as $activity): $slug = slugify($activity); ?>
      
        <?php $selected = ($slug === $activityParameter ? 'selected' : '') ?>
        <option label="<?php echo $activity ?>" value="<?php echo $slug ?>" <?php echo $selected ?>>
          <?php echo $activity ?>
        </option>
      
      <?php endforeach ?>
      </optgroup>

    </select>

  </label>

  <?php function redirectPage($url, $params, $int = 1) {
    $result = array($url);
    foreach ($params as $key => $value) {
      if ($key === 'page') $value = $int;
      array_push($result, $key.':'.$value);
    }
    return join('/', $result);
  } ?>

  <?php if ($pagination['active'] == 1) : ?>
  <a href="<?php echo redirectPage($page->url(), params(), -1) ?>">
    <button type="button">Past Events</button>
  </a>
  <?php else : ?>
  <a href="<?php echo redirectPage($page->url(), params(), 1) ?>">
    <button type="button">Upcoming Events</button>
  </a>
  <?php endif ?>

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
