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
      
      <form method="post" class="contact__form">
        
        <?php if($alert): ?>
          <div class="alert">
          <ul>
            <?php foreach($alert as $message): ?>
            <li><?php echo html($message) ?></li>
            <?php endforeach ?>
          </ul>
          </div>
        <?php endif ?>
        <div class="input__row">
          <label for="email">E-mail</label>
          <input autofocus id="email" name="email" type="email">
        </div>
        <div class="input__row">
          <label>Your name?</label>
          <input id="name" name="name" type="text">
        </div>
        <div class="input__row">
          <label>Your message</label>
          <textarea rows="8" id="message" name="message" type="text"></textarea>
        </div>
        <button type="submit" name="submit" value="Submit">Verstuur</button>
      </form>

      

    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
