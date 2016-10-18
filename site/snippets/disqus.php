<div class="button_bar">
  <button class="light_btn disq_btn icon labeled" onclick="loadDisqus(this)">
    <svg width="32" height="32"><use xlink:href="#i:commenting"/></svg>
    Comments by Disqus
  </button>
  <button class="light_btn icon labeled right" onclick="showShare(this)">
    <svg width="32" height="32"><use xlink:href="#i:share"/></svg>
    Share
  </button>
  <div class="share_block">
    <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=#url">
      <svg width="32" height="32"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#i:facebook"></use></svg>
    </a>
    <a class="twitter-share-button" href="http://twitter.com/share?text=<?php echo $page->title() ?>&url=<?php echo $page->url() ?>&hashtags=DITscience&via=togethersci">
      <svg width="32" height="32"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#i:twitter"></use></svg>
    </a>
  </div>
</div>

<div id="disqus_thread"></div>
<script type="text/javascript">
  function showShare(e){
    document.querySelector('.share_block').classList.toggle('active');
  }
  function loadDisqus(el){
      el.disabled = true;

      // el.innerHTML = '<i class="fa fa-comments-o" aria-hidden="true"></i> Comments by Disqus';
      var d = document, s = d.createElement('script');
      s.src = '//ditos.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
  };
</script>
