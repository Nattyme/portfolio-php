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

    <!-- Обо мне -->
    <h3 class="admin-section-title">Обо мне</h3>
    <div class="admin-form__item" data-control="tab">
      <!-- Навигация -->
      <div class="tab__nav" data-control="tab-nav">
        <button type="button" class="tab__nav-button active" data-control="tab-button" 
                title="Перейти к редактированию заголовка страницы обо мне">
                Заголовок
        </button>
        <button type="button" class="tab__nav-button" data-control="tab-button" 
                title="Перейти к редактированию содержимого страницы обо мне">
                Содержимое поста 
        </button>
      </div>
      <!-- Навигация -->

      <!-- Блоки с контентом -->
      <div class="admin-form__item">
        <div class="tab__content" data-control="tab-content">
          <div class="tab__block active" data-control="tab-block">
            <label class="input__label">
              <input name="about_title" 
                     class="input input--width-label" 
                     type="text" 
                     placeholder="Введите заголовок страницы 'Обо мне' " 
                     value="<?php echo isset($_POST['about_title']) ? $_POST['about_title'] : $main['about_title']; ?>"
              />
            </label>
          </div>
          <div class="tab__block" data-control="tab-block">
            <label class="textarea__label mb-15" name="editor"></label>
            <textarea name="about_text" class="textarea textarea--width-label" 
                      placeholder="Введите текст для страницы 'Обо мне'" id="about_text">
              <?php echo isset($_POST['about_text']) ? $_POST['about_text'] : $main['about_text']; ?>
            </textarea>
          </div>
        
        </div>
      </div>
      <!--// Блоки с контентом -->
    </div>
    <!--// Обо мне -->

    <!-- Услуги -->
    <h3 class="admin-section-title">Услуги</h3>
    <div class="admin-form__item" data-control="tab">
      <!-- Навигация -->
      <div class="tab__nav" data-control="tab-nav">
        <button type="button" class="tab__nav-button active" data-control="tab-button" 
                title="Перейти к редактированию заголовка страницы услуги">
                Заголовок
        </button>
        <button type="button" class="tab__nav-button" data-control="tab-button" 
                title="Перейти к редактированию содержимого страницы услуги">
                Содержимое поста 
        </button>
      </div>
      <!-- Навигация -->

      <!-- Блоки с контентом -->
      <div class="admin-form__item">
        <div class="tab__content" data-control="tab-content">
          <div class="tab__block active" data-control="tab-block">
            <label class="input__label">
              <input name="services_title" 
                     class="input input--width-label" 
                     type="text" 
                     placeholder="Введите заголовок страницы 'Услуги'" 
                     value="<?php echo $main['services_title']; ?>"
              />
            </label>
          </div>
          <div class="tab__block" data-control="tab-block">
            <label class="textarea__label mb-15" name="editor"></label>
            <textarea name="services_text" class="textarea textarea--width-label" 
                      placeholder="Введите текст" id="services_text">
              <?php echo $main['services_text'] ;?>
            </textarea>
            </textarea>
          </div>
        
        </div>
      </div>
      <!--// Блоки с контентом -->
    </div>
    <!--// Услуги -->

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

