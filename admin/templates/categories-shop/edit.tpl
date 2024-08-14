<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/category-shop-edit?id=<?php echo $cat['id']; ?>">
    <div class="admin-form__item">
      <h2 class="heading">Редактировать категорию</h2>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Название категории
        <input 
          name="title" 
          class="input input--width-label" 
          type="text" 
          placeholder="Заголовок категории" 
          value="<?php echo $cat['title'];?>"
        />
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">
        Сохранить изменения
      </button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/category-shop">Отмена</a>
    </div>
  </form>
</div>

