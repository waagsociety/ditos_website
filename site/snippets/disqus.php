<button class="disq_btn" onclick="loadDisqus(this)"><i class="fa fa-comments-o" aria-hidden="true"></i> Load comments by Disqus</button>
<div id="disqus_thread"></div>

<script type="text/javascript">
  function loadDisqus(el){
      el.classList.add('deactive');
      var d = document, s = d.createElement('script');
      s.src = '//ditos.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
  };
</script>
