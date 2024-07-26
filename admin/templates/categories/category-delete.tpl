<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/category-delete">
    <div class="admin-form__item">
      <h2 class="heading">Удалить категорию</h2>
    </div>
    <div class="admin-form__item">
      <p>Вы действительно хотите удалить категорию <strong>"Название"</strong>?</p>  
    </div>

    <div class="admin-form__item buttons">
      <button name="postDelete" value="postDelete" class="primary-button primary-button--red" type="submit">
        Удалить
      </button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/category">Отмена</a>
    </div>
  </form>
</div>

