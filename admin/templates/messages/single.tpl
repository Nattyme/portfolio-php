<div class="admin-page__content-form">

  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/message?id=<?php echo $message['id']; ?>">
    <div class="admin-form__item admin-form__item--flex">
      <h2 class="heading">Сообщение №<?php echo $_GET['id'];?></h2>
      <div class="admin-form__date">
        <img src="<?php echo HOST;?>static/img/favicons/clock.svg" alt="Получено">
        Получено
        <?php echo rus_date("j F Y в H:i", $message['timestamp']); ?>              
      </div>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Имя отправителя
      </label>
      <p><?php echo $message['name']; ?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Email отправителя
      </label>
      <p><?php echo $message['email']; ?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Текст сообщения
      </label>
      <p>
        <?php echo $message['message']; ?>
      </p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Прикреплённый файл
      </label>
      <p>
        <a target="_blank" href="<?php echo HOST . 'usercontent/contact-form/' . $message['fileNameSrc']; ?>">
          <?php echo $message['fileNameOriginal']; ?>
        </a>
      </p>
    </div>

    <div class="admin-form__item buttons justify-content-between">
      <a class="secondary-button" href="<?php echo HOST;?>admin/messages">Отмена</a>
      <div>
        <a class="primary-button primary-button--red" href="<?php echo HOST . 'admin/messages?action=delete&id=' . $message['id'];?>" class="icon-delete">
          Удалить
        </a>
        <a href="<?php echo HOST . 'admin/user-block?id=' . $message['id'];?>" name="block-user" class="primary-button primary-button--red" class="icon-delete">
          Заблокировать пользователя
        </a>
      </div>
      
    </div>
  </form>
</div>

