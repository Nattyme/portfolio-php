<script src="<?php echo HOST;?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" 
        method="POST" 
        action="<?php echo HOST;?>admin/contacts">

    <div class="admin-form__item">
      <h2 class="heading">Редактировать контакты</h2>
    </div>

    <!-- About -->
    <h3 class="admin-section-title">Обо мне</h3>
    <div class="admin-form__item" data-control="tab">
      <!-- Навигация -->
      <div class="tab__nav" data-control="tab-nav">
        <button type="button" class="tab__nav-button active" data-control="tab-button" 
                title="Перейти к редактированию заголовка секции 'Обо мне' на странице 'Контакты'">
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
              <input name="about_title" 
                class="input input--width-label" 
                type="text" 
                placeholder="Заголовок секции 'Обо мне'" 
                value="<?php echo $contacts['about_title']; ?>"
              />
            </label>
          </div>
          <div class="tab__block" data-control="tab-block">
            <label class="textarea__label mb-15" name="editor"></label>
            <textarea name="about_text" class="textarea textarea--width-label" placeholder="Введите текст" id="about_text">
              <?php echo $contacts['about_text'] ;?>
            </textarea>
          </div>
        
        </div>
      </div>
      <!--// Блоки с контентом -->
    </div>

    <!-- Services -->
    <h3 class="admin-section-title">Услуги</h3>
    <div class="admin-form__item" data-control="tab">
      <!-- Навигация -->
      <div class="tab__nav" data-control="tab-nav">
        <button type="button" class="tab__nav-button active" data-control="tab-button" 
                title="Перейти к редактированию заголовка секции 'Услуги' на странице 'Контакты'">
                Заголовок
        </button>
        <button type="button" class="tab__nav-button" data-control="tab-button" 
                title="Перейти к редактированию содержимого секции 'Услуги' на странице 'Контакты'">
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
                placeholder="Заголовок секции 'Услуги'" 
                value="<?php echo $contacts['services_title']; ?>"
              />
            </label>
          </div>
          <div class="tab__block" data-control="tab-block">
            <label class="textarea__label mb-15" name="editor"></label>
              <textarea name="services_text" class="textarea textarea--width-label" placeholder="Введите текст" id="services_text">
                <?php echo $contacts['services_text'] ;?>
              </textarea>
          </div>
        
        </div>
      </div>
      <!--// Блоки с контентом -->
    </div>

    <!--Contacts -->
    <h3 class="admin-section-title">Контактные данные</h3>
    <div class="admin-form__item" data-control="tab">
      <!-- Навигация -->
      <div class="tab__nav" data-control="tab-nav">
        <button type="button" class="tab__nav-button active" data-control="tab-button" 
                title="Перейти к редактированию заголовка секции 'Контакты' на странице 'Контакты'">
                Заголовок
        </button>
        <button type="button" class="tab__nav-button" data-control="tab-button" 
                title="Перейти к редактированию содержимого секции 'Контакты' на странице 'Контакты'">
                Содержимое поста 
        </button>
      </div>
      <!-- Навигация -->

      <!-- Блоки с контентом -->
      <div class="admin-form__item">
        <div class="tab__content" data-control="tab-content">
          <div class="tab__block active" data-control="tab-block">
            <label class="input__label">
              <input name="contacts_title" 
                class="input input--width-label" 
                type="text" 
                placeholder="Заголовок секции 'Контакты'" 
                value="<?php echo $contacts['contacts_title']; ?>"
              />
            </label>
          </div>
          <div class="tab__block" data-control="tab-block">
            <label class="textarea__label mb-15" name="editor"></label>
            <textarea name="contacts_text" class="textarea textarea--width-label" placeholder="Введите текст" id="contacts_text">
              <?php echo $contacts['contacts_text'] ;?>
            </textarea>
          </div>
        
        </div>
      </div>
      <!--// Блоки с контентом -->
    </div>
    <!--// Contacts -->

    <div class="admin-form__item buttons">
      <button name="submit" value="postEdit" class="primary-button" type="submit">Сохранить изменения</button>
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
<script>
  CKEDITOR.replace('contacts_text', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>
