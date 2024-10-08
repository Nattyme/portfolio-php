<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/brand-new">
    <div class="admin-form__item">
      <h2 class="heading">Новый бренд</h2>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Введите название бренда
        <input name="title" class="input input--width-label" type="text" placeholder="Заголовок бренда" />
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">
        Создать
      </button>
      <!-- <a class="secondary-button" href="<?php echo HOST;?>admin/brand">Отмена</a> -->
      <?php $link = isset($_SESSION['currentSection']) && $_SESSION['currentSection'] === 'admin/shop-new' ? 'admin/shop-new' : 'admin/brand'?>
      <a class="secondary-button" href="<?php echo HOST . $link;?>">Отмена</a>
    </div>
  </form>
</div>

