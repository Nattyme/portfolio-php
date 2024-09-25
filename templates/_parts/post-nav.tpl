<div class="post-pagination">
  <?php if ( !empty($prevId) ) : ?>
    <a class="post-pagination__button" href="<?php echo HOST . $uriModule . '/' . $prevId; ?>" title="Вернуться на предыдущую страницу">Назад </a>
  <?php endif; ?>

  <?php if ( !empty($nextId)) : ?>
    <a class="post-pagination__button post-pagination__button--forward" href="<?php echo HOST . $uriModule . '/' . $nextId; ?>" title="Перейти на следующую страницу">Вперед</a>
  <?php endif; ?>
</div>