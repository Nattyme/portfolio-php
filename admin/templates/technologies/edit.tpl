<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/techngology-edit?id=<?php echo $techngology['id']; ?>">
    <div class="admin-form__item">
      <h2 class="heading">Редактировать технологию</h2>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Название технологии
        <input 
          name="title" 
          class="input input--width-label" 
          type="text" 
          placeholder="Заголовок бренда" 
          value="<?php echo $techngology['title'];?>"
        />
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">
        Сохранить изменения
      </button>
      <?php if (isset($_POST['postEdit'])) : ?>
        <a class="secondary-button" href="<?php echo HOST;?>admin/techngology" title="К списку технологий">К списку технологий</a>
      <?php else : ?>
        <a class="secondary-button" href="<?php echo HOST;?>admin/techngology" title="Отмена">Отмена</a>
      <?php endif; ?>
    </div>
  </form>
</div>

