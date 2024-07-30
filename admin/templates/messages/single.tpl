<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/category-edit?id=<?php echo $cat['id']; ?>">
    <div class="admin-form__item">
      <h2 class="heading">Сообщение №1</h2>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Имя отправителя
      </label>
      <p>Наталья</p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Email отправителя
      </label>
      <p>info@mail.ru</p>
    </div>

    <div class="admin-form__item">
      <label class="input__label mb-10">
        Текст сообщения
      </label>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi optio eos quia velit ipsam nobis eligendi nam adipisci doloremque fuga, accusantium, quae laboriosam exercitationem odio cumque aliquam? Explicabo, nisi quibusdam!</p>
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

