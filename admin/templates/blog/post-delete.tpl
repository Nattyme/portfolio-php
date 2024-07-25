<div class="admin-page__content-form">
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/post-new" enctype="multipart/form-data">
    <div class="admin-form__item">
      <h2 class="heading">Удалить пост</h2>
    </div>
    <div class="admin-form__item">
      <p><strong>Вы действительно хотите удалить пост?</strong></p>
      <p><strong>id: </strong>34 </p>
      <p><strong>Название: </strong>Название поста</p>
  
    </div>

    <div class="admin-form__item buttons">
      <button name="postSubmit" value="postSubmit" class="primary-button primary-button--red" type="submit">Удалить</button>
      <a class="secondary-button" href="#">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

