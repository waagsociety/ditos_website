<?php 
  $slides = $page->slider()->yaml(); 
?>

<section class="slider">
<nav class="slider-nav">
  <?php foreach($slides as $key => $slide): ?>
    <a class="bullet" href="#slide-<?= $key ?>"></a>
  <?php endforeach ?>
</nav>
<?php foreach($slides as $key => $slide): ?>
  <figure id="#slide-<?= $key ?>" class="item" style="background-image: url(<?php echo $page->contentURL() ?>/<?php echo $slide['image'] ?>);">
    <img src="http://localhost:8888/content/gmo-genetic-modification-glow-dark.jpg" />
    <figcaption class="caption">
      <?php echo kirbytext($slide['content']) ?>
    </figcaption>
  </figure>
<?php endforeach ?>


</section>

<script type="text/javascript">

  function loadSlides() {
    var slider = document.querySelector('.slider')
    var current = 0
    var pause = false
    var items = [].slice.call(document.querySelectorAll('.slider .item'))
    var bullets = [].slice.call(document.querySelectorAll('.slider .bullet'))

    document.querySelector('.slider .item').classList.add('active')
    document.querySelector('.slider .bullet').classList.add('active')

    slider.onmouseenter = function() { 
      pause = true
    }

    slider.onmouseleave = function() { 
      pause = false
    }

    setInterval(function() {
      console.log('current slide id', current)
      if (pause != true ) {
        document.querySelector('.slider .item.active').classList.remove('active')
        document.querySelector('.slider .bullet.active').classList.remove('active')
        current = (current != items.length - 1) ? current + 1 : 0;
        items[current].classList.toggle('active');
        bullets[current].classList.toggle('active');
      }
    }, 5000);
  }

  loadSlides();
</script>
