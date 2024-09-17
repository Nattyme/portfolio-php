<div class="admin-page__content-form">
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST . 'admin/project-delete?id=' . $project['id']; ?>" enctype="multipart/form-data">
    <div class="admin-form__item">
      <h2 class="heading">Удалить проект</h2>
    </div>
    <div class="admin-form__item">
      <p><strong>Вы действительно хотите удалить проект?</strong></p>
      <p><strong>id: </strong><?php echo $project['id'];?></p>
      <p><strong>Название: </strong><?php echo $project['title'];?></p>
  
    </div>

    <div class="admin-form__item buttons">
      <button name="postDelete" value="postDelete" class="primary-button primary-button--red" type="submit">Удалить</button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/blog">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

