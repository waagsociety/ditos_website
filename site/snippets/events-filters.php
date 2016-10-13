<?php $items = $pages->find('events')->children()->visible()->limit(3); ?>

<header class="events__filters">
  <nav class="tabs">
    <button>Map</button>
    <button>List</button>
  </nav>
</header>

<form id="filter-events" class="events__filters full__width">
  
  <?php $countries = $page->children()->visible()->pluck('country', ',', true) ?>
  <label>
    Where
    <select name="country">
      <option value="" selected>Everywhere</option>
      <optgroup label="Filter by country">
      <?php foreach($countries as $key => $country): ?>      
      <option value="<?php echo $key ?>"><?php echo $country ?></option>
      <?php endforeach ?>
      </optgroup>
    </select>
  </label>

  <!-- <label>
    What
    <input type="select" name="country">
  </label> -->

</form>
<script type="text/javascript">
!function() {

  var form = document.getElementById('filter-events')
  console.log(form)

}()
</script>
