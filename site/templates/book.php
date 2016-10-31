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
          <label for="name">Name</label>
          <input autofocus id="name" name="name" type="text">
        </div>
        <div class="input__row">
          <label for="email">E-mail</label>
          <input id="email" name="email" type="email">
        </div>
        <div class="input__row">
          <label for="phone">Phone</label>
          <input id="phone" name="phone" type="phone">
        </div>
        <div class="input__row">
          <label for="organisation">Which organisation do you represent?</label>
          <input id="organisation" name="organisation" type="organisation">
        </div>
        <div class="input__row">
          <label for="why">Why do you want the science express to visit your town?</label>
          <textarea id="why" name="why" type="why" rows="4"></textarea> 
        </div>
        <div class="input__row">
          <label for="activities">What kind of activity would you like to organise with the science express?</label>
          <textarea id="activities" name="activities" type="activities" rows="4"></textarea> 
        </div>
        <div class="input__row">
          <label>We are curious about you! Tell us something about yourself and why the science express would make a difference to your community by visiting in the summer of 2017.</label>
          <textarea id="about" name="about" type="about" rows="8"></textarea> 
        </div>
        <div class="input__row">
          <label for="amount">How many people would you expect to visit a program of the science express in your community and what is their background?</label>
          <textarea id="amount" name="amount" type="amount" rows="3"></textarea> 
        </div>
        <button type="submit" name="submit" value="Submit">Verstuur</button>
      </form>

    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
</main>
<?php snippet('footer') ?>
