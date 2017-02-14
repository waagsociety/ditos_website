<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section class="main-section">
      <?php snippet('standard-header') ?>
      <div class="text">
        <?php echo kirbytext($page->text()) ?>


        <?php $words = $page->word()->toStructure() ?>
         <?php if (count($words)) : ?>
           <?php foreach ($words as $word) : ?>
            <button class="accordion"><h2><?=  $word->word() ?></h2></button>
              <div class="panel">
              <p><?=  $word->meaning() ?></p>
              </div>
           <?php endforeach ?>
         <?php endif ?>

          <script type="text/javascript">
            /* Toggle between adding and removing the "active" and "show" classes when the user clicks on one of the "Section" buttons. The "active" class is used to add a background color to the current button when its belonging panel is open. The "show" class is used to open the specific accordion panel */
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].onclick = function(){
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
              }
            }

          </script>
      </div>
    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
