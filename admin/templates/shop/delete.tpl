<div class="admin-page__content-form">
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST . 'admin/shop-delete?id=' . $post['id']; ?>" enctype="multipart/form-data">
    <div class="admin-form__item">
      <h2 class="heading">Удалить товар</h2>
    </div>
    <div class="admin-form__item">
      <p><strong>Вы действительно хотите удалить товар?</strong></p>
      <p><strong>id: </strong><?php echo $post['id'];?></p>
      <p><strong>Название: </strong><?php echo $post['title'];?></p>
  
    </div>

    <div class="admin-form__item buttons">
      <button name="postDelete" value="postDelete" class="primary-button primary-button--red" type="submit">Удалить</button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/shop">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

