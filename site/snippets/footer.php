  <?php echo js('assets/js/main.min.js') ?>
  <!-- Piwik -->
  <script type="text/javascript">
   var _paq = _paq || [];
   _paq.push(['trackPageView']);
   _paq.push(['enableLinkTracking']);
   (function() {
     var u="//stats.waag.org/";
     _paq.push(['setTrackerUrl', u+'piwik.php']);
     _paq.push(['setSiteId', '8']);
     var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
     g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
   })();
  </script>
  <noscript><p><img src="//stats.waag.org/piwik.php?idsite=8" style="border:0;" alt="" /></p></noscript>
  <!-- End Piwik Code —>
  <?php snippet('icons') ?>
</body>
</html>
