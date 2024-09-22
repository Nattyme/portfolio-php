<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/category-new?<?php echo $currentSection;?>">
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
      <?php 
        if( isset ($_SESSION['currentSection']) && $_SESSION['currentSection'] === 'admin/project-new') {
          $link = 'admin/project-new';
        } else if (isset ($_SESSION['currentSection']) && $_SESSION['currentSection'] === 'admin/shop-new') {
          $link = 'admin/shop-new';
        } else if (isset ($_SESSION['currentSection']) && $_SESSION['currentSection'] === 'admin/post-new') {
          $link = 'admin/post-new';
        } else {
          $link = 'admin/category?'. $currentSection;
        }
      ?>
      <a class="secondary-button" href="<?php echo HOST . $link;?>">Отмена</a>
    </div>
  </form>
</div>

