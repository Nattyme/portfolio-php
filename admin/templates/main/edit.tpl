<script src="<?php echo HOST;?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" 
        method="POST" 
        action="<?php echo HOST;?>admin/main">

    <div class="admin-form__item">
      <h2 class="heading">Редактировать главную страницу</h2>
    </div>

    <!-- About -->
    <h3 class="admin-section-title">Обо мне</h3>
    <div class="admin-form__item">
      <label class="input__label">
        Заголовок
        <input name="about_title" 
               class="input input--width-label" 
               type="text" 
               placeholder="Заголовок секции" 
               value="<?php echo $main['about_title']; ?>"
        />
      </label>
    </div>
    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="about_text" class="textarea textarea--width-label" placeholder="Введите текст" id="about_text">
        <?php echo $main['about_text'] ;?>
      </textarea>
    </div>
    <!--// About -->

    <!-- Services -->
    <h3 class="admin-section-title">Услуги</h3>
    <div class="admin-form__item">
      <label class="input__label">
        Заголовок
        <input name="services_title" 
               class="input input--width-label" 
               type="text" 
               placeholder="Заголовок секции" 
               value="<?php echo $main['services_title']; ?>"
        />
      </label>
    </div>
    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="services_text" class="textarea textarea--width-label" placeholder="Введите текст" id="services_text">
        <?php echo $main['services_text'] ;?>
      </textarea>
    </div>
    <!--// Services -->

    <!-- Фото главной страницы -->
    <div class="admin-form__item">
      <div class="block-upload">
        <div class="block-upload__description">
          <div class="block-upload__title">Обложка главной страницы</div>
          <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до 2Мб.</p>
          <div class="block-upload__file-wrapper">
            <input name="cover" class="file-button" type="file">
          </div>
        </div>
        <?php  if (!empty($main['main_img'])) : ?>
          <div class="block-upload__img">
            <img src="<?php echo HOST . 'usercontent/main/' . $main['main_img'];?>" alt="Загрузка картинки" />
          </div>
          <label class="checkbox__item mt-15">
            <input class="checkbox__btn" type="checkbox" name="delete-cover">
            <span class="checkbox__label">Удалить обложку</span>
          </label>
        <?php endif; ?>
      </div>
    </div>
    <!--// Фото главной страницы -->

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">Сохранить изменения</button>
      <a class="secondary-button" href="<?php echo HOST;?>admin">Отмена</a>
    </div>
    
  </form>
</div>

<script>
  CKEDITOR.replace('about_text', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>
<script>
  CKEDITOR.replace('services_text', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>

