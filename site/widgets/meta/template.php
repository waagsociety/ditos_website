<div class="dashboard-box">
    <ul class="dashboard-items">
      <?php foreach($meta as $item): ?>
        <li class="dashboard-item">
            <a title="<?php __($item->title()) ?>" href="<?php __($item->url('edit')) ?>">
              <figure>
                <span class="dashboard-item-icon dashboard-item-icon-with-border"><?php echo $item->icon('') ?></span>
                <figcaption class="dashboard-item-text"><?php __($item->title()) ?></figcaption>
              </figure>
            </a>
        </li>
      <?php endforeach ?>
    </ul>
</div>
