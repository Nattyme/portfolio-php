<div class="admin-page__content-form">

  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/category-edit?id=<?php echo $message['id']; ?>">
    <div class="admin-form__item">
      <h2 class="heading">Сообщение №<?php echo $_GET['id'];?></h2>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Получено
      </label>
      <p><?php echo rus_date("j F Y в H:i", $message['timestamp']); ?></p>
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
      <p>photo.jpeg</p>
    </div>

    <div class="admin-form__item buttons justify-content-between">
      <a class="secondary-button" href="<?php echo HOST;?>admin/messages">Отмена</a>
      <button name="submit" value="submit" class="primary-button primary-button--red" type="submit">
        Удалить
      </button>
    </div>
  </form>
</div>

