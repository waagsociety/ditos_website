<?php 

$url = $page->url();

$viewIndex = ['Map', 'List'];
$viewParameter = param('view', 'list');
$countryParameter = param('country');
$activityParameter = param('activity');
$tagsParameter = param('tagged');

function redirectPage($url, $params, $int = 1) {
  $result = array($url);
  foreach ($params as $key => $value) {
    if ($key === 'page') $value = $int;
    array_push($result, $key.':'.$value);
  }
  return join('/', $result);
}

function slugify($string) {
  $string = trim($string);
  $string = preg_replace('/\W+/', '-', $string);
  $string = strtolower($string);
  return $string;
}

?>
<form id="filter-events" class="<?php echo param('view', 'map') ?>"> 
  
  <nav class="tabs">
  <?php foreach ($viewIndex as $name): $slug = slugify($name) ?> 
    
    <?php $selected = $slug === $viewParameter ?>
    <label class="btn <?php e($selected, 'is-active '); echo $slug; ?>">
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

  <?php if ($tagsParameter) : ?>
    <label class="btn tag">
      <input type="checkbox" name="tagged" value="<?= $tagsParameter ?>" checked>
      <svg width="24" height="24" stroke-width="2">
        <path d="M6,6 l12,12 M18,6 l-12,12"/>
      </svg>
    #<?= $tagsParameter ?>
    </label>
  <?php endif ?>

</form>
<?php
  $parameters = [];
  foreach (params() as $key => $value) {
    if ($key !== 'page') array_push($parameters, $key.':'.$value);
  }
  $parameters = join('/', $parameters);
  $baseURL = $page->url();
  $eventArchive = $page->uri() === 'events/archive';

  if ($eventArchive) {
    $eventLink = explode('/', $baseURL);
    array_pop($eventLink);
    array_push($eventLink, $parameters);
  }
  else $eventLink = [ $baseURL, 'archive', $parameters ];

?>
<a class="btn archive" href="<?= join('/', $eventLink) ?>"><?= $eventArchive ? 'Upcoming' : 'Past' ?> Events</a>


<script type="text/javascript"><?php // do not move ?>
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
