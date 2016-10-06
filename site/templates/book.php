<?php snippet('header') ?>
<main class="main__content">
  <div class="flex flex__wrap">
    <section>
      <header class="blog__header">
        <h1><?php echo $page->title() ?></h1>
      </header>
      <div class="text">
        <?php echo kirbytext($page->text()) ?>
      </div>
      
      <form class="contact__form">
        <div class="input__row">
          <label>What is your Name or nickname?</label>
          <input>
        </div>
        <div class="input__row">
          <label>We would like to contact you on your E-mail</label>
          <input>
        </div>
        <div class="input__row">
          <label>When do you want to book the bus?</label>
          <input>
        </div>
        <div class="input__row">
          <label>What city should we drive by?</label>
          <input>
        </div>
        <div class="input__row">
          <label>Anything you want to share?</label>
          <textarea rows="8"></textarea> 
        </div>
        <button class="call__to__action">Request the bus</button>
      </form>

    </section>
    <aside>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
