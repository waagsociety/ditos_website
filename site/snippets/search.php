<form id="searchform" class="search__form">
  <input id="mainsearch" placeholder="search" type="search" name="q" value="<?php echo esc($query) ?>">
  <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
<script type="text/javascript">
  document.getElementById('searchform').addEventListener('submit', function(evt){
    evt.preventDefault();
    var searchVal = document.getElementById('mainsearch').value;
    window.location.href = '/search?q=' + searchVal;
  })
</script>
