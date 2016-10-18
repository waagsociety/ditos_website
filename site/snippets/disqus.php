<div class="button_bar">
  <button class="light_btn disq_btn icon labeled" onclick="loadDisqus(this)">
    <svg width="32" height="32"><use xlink:href="#i:commenting"/></svg>
    Comments by Disqus
  </button>
  <button class="light_btn icon labeled right">
    <svg width="32" height="32"><use xlink:href="#i:share"/></svg>
    Share
  </button>
</div>

<div id="disqus_thread"></div>
<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=#url">Share</a>
<script type="text/javascript">
  function loadDisqus(el){
      el.disabled = true;

      // el.innerHTML = '<i class="fa fa-comments-o" aria-hidden="true"></i> Comments by Disqus';
      var d = document, s = d.createElement('script');
      s.src = '//ditos.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
  };
</script>
