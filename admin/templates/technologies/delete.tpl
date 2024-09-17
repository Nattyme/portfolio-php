<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/techngology-delete?id=<?php echo $techngology['id']; ?>">
    <div class="admin-form__item">
      <h2 class="heading">Удалить технлолгию</h2>
    </div>
    <div class="admin-form__item">
      <p>Вы действительно хотите удалить технологию <strong>"<?php echo $techngology['title'];?>"</strong>?</p>  
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button primary-button--red" type="submit">
        Удалить
      </button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/techngology">Отмена</a>
    </div>
  </form>
</div>

