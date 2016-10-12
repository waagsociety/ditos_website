afafa<?php $calendar = calendar($page->calendar()->yaml()); ?>
<?php snippet('header') ?>
<main class="main__content">
  <section id="calendar" class="full__width">

    <header class="blog__header">
      <h1><?php echo $page->title() ?></h1>
    </header>

    <?php //snippet('calendar/calendar-test') ?>
    <?php
    snippet('calendar/calendar-table', array(
      'calendar'  => $calendar,
      'fields' => array(
        'summary' => l::get('title'),
        'description' => l::get('description')
      )
    ));
    ?>
    
  </section>
  <?php snippet('partners') ?>
</main>
<?php snippet('footer') ?>
