<li class="control-panel__list-item">
  <a class="control-panel__list-link" href="<?php echo HOST; ?>admin/messages" title="Перейти к списку всех сообщений">
    <div class="control-panel__list-img-wrapper">
      <img class="control-panel__list-img" src="<?php echo HOST; ?>static/img/control-panel/mail.svg" alt="icon" />
      <?php if ($messagesNewCounter > 0) : ?>
        <div class="control-panel__list-img-badge">
          <?php echo $messagesNewCounter;?>
        </div>
      <?php endif; ?>
    </div>
    Сообщения
  </a>
</li>