<li class="control-panel__list-item">
  <a class="control-panel__list-link" href="<?php echo HOST; ?>admin/comments">
    <div class="control-panel__list-img-wrapper">
      <img class="control-panel__list-img" src="<?php echo HOST; ?>static/img/control-panel/message.svg" alt="icon" />
      <?php if ($commentsNewCounter > 0) : ?>
        <div class="control-panel__list-img-badge">
          <?php echo $commentsNewCounter;?>
        </div>
      <?php endif; ?>
    </div>
    Комментарии
  </a>
</li>
