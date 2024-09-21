<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/technology-new">
    <div class="admin-form__item">
      <h2 class="heading">Новая технология</h2>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Введите название технологии
        <input name="title" class="input input--width-label" type="text" placeholder="Название технологии" />
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">
        Создать
      </button>
      <?php $link = isset($_SESSION['currentSection']) && $_SESSION['currentSection'] === 'admin/project-new' ? 'admin/project-new' : 'admin/technology';?>
      <a class="secondary-button" href="<?php echo HOST . $link;?>">Отмена</a>
    </div>
  </form>
</div>

