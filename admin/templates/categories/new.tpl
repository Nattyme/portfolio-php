<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/category-new">
    <div class="admin-form__item">
      <h2 class="heading">Новая категория</h2>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Введите название категории
        <input name="title" class="input input--width-label" type="text" placeholder="Заголовок категории" />
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">
        Создать
      </button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/category">Отмена</a>
    </div>
  </form>
</div>

