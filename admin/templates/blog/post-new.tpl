<div class="admin-page__content">
  <div class="admin-page__content-form">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/post-new" enctype="multipart/form-data">
      <div class="admin-form__item">
        <h2 class="heading">Добавить пост </h2>
      </div>
      <div class="admin-form__item">
        <label class="input__label">
          Введите название записи 
          <input name="title" class="input input--width-label" type="text" placeholder="Заголовок поста" />
        </label>
      </div>
      <div class="admin-form__item">
        <label class="select-label">Выберите категорию <select class="select">
            <option value="notes1">Заметки путешественника</option>
            <option value="notes2">Заметки программиста</option>
            <option value="notes3">Заметки спортсмена</option>
          </select>
        </label>
      </div>
      <div class="admin-form__item">
        <label class="textarea__label">
          Содержимое поста 
          <textarea name="content" class="textarea textarea--width-label" placeholder="Введите текст"></textarea>
        </label>
      </div>
      <div class="admin-form__item">
        <div class="block-upload">
          <div class="block-upload__description">
            <div class="block-upload__title">Обложка поста:</div>
            <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до 2Мб.</p>
            <div class="block-upload__file-wrapper">
              <button class="file-button" type="file">Выбрать файл</button>
              <div class="block-upload__file-name">some-picture.jpg</div>
            </div>
          </div>
          <div class="block-upload__img"><img src="<?php echo HOST; ?>static/img/block-upload/block-upload.jpg" alt="Загрузка картинки" />
            <div class="block-downloads__delete">
              <button class="delete-button" type="reset">Удалить</button>
            </div>
          </div>
        </div>
      </div>
      <div class="admin-form__item buttons">
        <button name="postSubmit" value="postSubmit" class="primary-button" type="submit">Опубликовать</button><a class="secondary-button" href="#">Отмена</a>
      </div>
      <div class="admin-form__item"></div>
      <div class="admin-form__item"></div>
    </form>
  </div>
</div>
