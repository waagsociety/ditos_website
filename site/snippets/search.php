<?php
  $query = param('query');
?>

<form id="searchform" class="search__form">
  <input id="mainsearch" placeholder="search" type="search" name="q" value="<?php echo esc($query) ?>">
  <button type="submit" class="btn icon">
    <svg width="20" height="20"><use xlink:href="#i:search"/></svg>
  </button>
</form>

<script type="text/javascript">
  console.log('x')
  document.getElementById('searchform').addEventListener('submit', function(evt){
    evt.preventDefault();
    var searchVal = document.getElementById('mainsearch').value;
    window.location.href = '/search/query:' + searchVal;
  })
</script>
