<div class="admin-page__content-form">

  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/comment?id=<?php echo $mcomment['id']; ?>">
    <div class="admin-form__item admin-form__item--flex">
      <h2 class="heading">Комментарий №<?php echo $_GET['id'];?></h2>
      <div class="admin-form__date">
        <img src="<?php echo HOST;?>static/img/favicons/clock.svg" alt="Получено">
        Получено
        <?php echo rus_date("j F Y в H:i", $comment['timestamp']); ?>              
      </div>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Имя отправителя
      </label>
      <p><?php echo $comment['user_name']; ?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Имя отправителя
      </label>
      <p><?php echo $comment['user_surname']; ?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Email отправителя
      </label>
      <p><?php echo $comment['user_email']; ?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Текст комментария
      </label>
      <p>
        <?php echo $comment['text']; ?>
      </p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        К записи
      </label>
      <p>
        <?php echo $comment['post_title']; ?>
      </p>
    </div>

    <div class="admin-form__item buttons justify-content-between">
      <a class="secondary-button" href="<?php echo HOST;?>admin/comments">Отмена</a>
      <a class="primary-button primary-button--red" href="<?php echo HOST . 'admin/comments?action=delete&id=' . $comment['id'];?>" class="icon-delete">
        Удалить
      </a>
    </div>
  </form>
</div>

