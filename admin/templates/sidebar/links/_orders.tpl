<li class="control-panel__list-item">
  <a class="control-panel__list-link" href="<?php echo HOST;?>admin/orders" title="Перейти к списку всех заказов">
    <div class="control-panel__list-img-wrapper">
      <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/folder.svg" alt="icon" />
      <?php if ($ordersNewCounter > 0) : ?>
        <div class="control-panel__list-img-badge">
          <?php echo $ordersNewCounter;?>
        </div>
      <?php endif; ?>
    </div>
    Заказы
  </a>
</li>
