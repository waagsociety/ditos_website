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
          <label>Subject</label>
          <select>
            <option>Book the bus</option>
            <option>Submit a blog post</option>
          </select>
        </div>
        <div class="input__row">
          <label>Name</label>
          <input placeholder="hoi">
        </div>
        <div class="input__row">
          <label>E-mail</label>
          <input placeholder="hoi">
        </div>
        <div class="input__row">
          <label>Message</label>
          <textarea placeholder="Message" rows="8"></textarea> 
        </div>
      </form>

    </section>
    <aside>
      <?php snippet('events-preview') ?>
    </aside>
  </div>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
