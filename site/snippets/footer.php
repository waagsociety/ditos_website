  <?php echo js('assets/js/main.min.js') ?>
  <script>
  var localPattern = new RegExp('^<?= $site->url() ?>');
  Array.prototype.slice.call(document.querySelectorAll('a')).forEach(function(link) {
    if (!localPattern.test(link.href)) link.target = '_blank'
  })
  </script>
  <?php snippet('icons') ?>
  <?php snippet('piwik') ?>
</body>
</html>
