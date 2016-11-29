<?php 

$url = $page->url();
$query = param('query');

function slugify($string) {
  $string = trim($string);
  $string = preg_replace('/\W+/', '-', $string);
  $string = strtolower($string);
  return $string;
}

$index = $site->children()->visible();

$page = param('page');
$directory = "";
foreach ($index as $child) {
  if ($child->isOpen() || (string)$child === $page) $directory = $child;
  echo $child->title();
}

?>

<form id="filter-search"> 

  <div class="events__filters full__width">
  <label class="form__select">
    Where
    <select name="page">

      <option value="">Everywhere</option>

      <optgroup label="Filter by page">
      <?php foreach($index as $child): $slug = slugify($child); ?>
        <?php $selected = ($slug == $directory ? 'selected' : '') ?>
        <option label="<?php echo $child->title() ?>" value="<?php echo (string)$child ?>" <?php echo $selected ?>>
          <?php echo $child->title() ?>
        </option>
      
      <?php endforeach ?>
      </optgroup>

    </select>

  </label>

</form>

<script type="text/javascript">
<?php // do not move ?>
var $url = "<?= $url ?>/"

var form = document.getElementById('filter-search')
var fields = Array.prototype.slice.call(form.querySelectorAll('[name]'))
var parameters = null

form.onchange = function(event) {
  parameters = fields.reduce(function(result, element) {
    console.log(element)
    const isCheck = typeof element.checked === 'boolean'
    if (isCheck ? element.checked : !!element.value){ 
      result.push(element.name + ':' + element.value)
    }
    return result
  }, []).join('/')
  location = $url + 'query:<?= $query ?>/' + parameters
}
</script>
