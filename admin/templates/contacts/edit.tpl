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
    <div class="admin-form__item">
      <label class="input__label">
        Заголовок
        <input name="about_title" 
               class="input input--width-label" 
               type="text" 
               placeholder="Заголовок секции" 
               value="<?php echo $contacts['about_title']; ?>"
        />
      </label>
    </div>
    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="about_text" class="textarea textarea--width-label" placeholder="Введите текст" id="about_text">
        <?php echo $contacts['about_text'] ;?>
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
               value="<?php echo $contacts['services_title']; ?>"
        />
      </label>
    </div>
    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="services_text" class="textarea textarea--width-label" placeholder="Введите текст" id="services_text">
        <?php echo $contacts['services_text'] ;?>
      </textarea>
    </div>
    <!--// Services -->

    <!--Contacts -->
    <h3 class="admin-section-title">Контактные данные</h3>
    <div class="admin-form__item">
      <label class="input__label">
        Заголовок
        <input name="contacts_title" 
               class="input input--width-label" 
               type="text" 
               placeholder="Заголовок секции" 
               value="<?php echo $contacts['contacts_title']; ?>"
        />
      </label>
    </div>
    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="contacts_text" class="textarea textarea--width-label" placeholder="Введите текст" id="contacts_text">
        <?php echo $contacts['contacts_text'] ;?>
      </textarea>
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
