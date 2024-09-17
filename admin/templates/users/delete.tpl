<div class="admin-page__content-form">
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST . 'admin/user-delete?id=' . $user['id']; ?>">
    <div class="admin-form__item">
      <h2 class="heading">Удалить пользователя</h2>
    </div>
    <div class="admin-form__item">
      <p><strong>Вы действительно хотите удалить пользователя?</strong></p>
      <p><strong>id: </strong><?php echo $user['id'];?></p>
      <p><strong>Имя: </strong><?php echo $user['name'];?></p>
      <p><strong>Электронная почта: </strong><?php echo $user['email'];?></p>
      <p><strong>Роль: </strong><?php echo $user['role'];?></p>
  
    </div>

    <div class="admin-form__item buttons">
      <button name="postDelete" value="postDelete" class="primary-button primary-button--red" type="submit">Удалить</button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/users">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

