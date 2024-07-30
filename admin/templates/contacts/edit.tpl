<script src="<?php echo HOST;?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" 
        method="POST" 
        action="<?php echo HOST;?>admin/post-edit?id=<?php echo $post['id']; ?>" enctype="multipart/form-data">

    <div class="admin-form__item">
      <h2 class="heading">Редактировать контакты</h2>
    </div>

    <h3 class="admin-section-title">Обо мне</h3>
    
    <div class="admin-form__item">
      <label class="input__label">
        Заголовок
        <input name="title" 
               class="input input--width-label" 
               type="text" 
               placeholder="Заголовок секции" 
               value="<?php echo $post['title']; ?>"
        />
      </label>
    </div>

    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="content" class="textarea textarea--width-label" placeholder="Введите текст" id="editor">
        <?php echo $post['content'] ;?>
      </textarea>
    </div>

    <h3 class="admin-section-title">Услуги</h3>
    
    <div class="admin-form__item">
      <label class="input__label">
        Заголовок
        <input name="title" 
               class="input input--width-label" 
               type="text" 
               placeholder="Заголовок секции" 
               value="<?php echo $post['title']; ?>"
        />
      </label>
    </div>

    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="content" class="textarea textarea--width-label" placeholder="Введите текст" id="editor">
        <?php echo $post['content'] ;?>
      </textarea>
    </div>

    <h3 class="admin-section-title">Контактные данные</h3>
    
    <div class="admin-form__item">
      <label class="input__label">
        Заголовок
        <input name="title" 
               class="input input--width-label" 
               type="text" 
               placeholder="Заголовок секции" 
               value="<?php echo $post['title']; ?>"
        />
      </label>
    </div>

    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Содержимое поста 
      </label>
      <textarea name="content" class="textarea textarea--width-label" placeholder="Введите текст" id="editor">
        <?php echo $post['content'] ;?>
      </textarea>
    </div>

    <div class="admin-form__item buttons">
      <button name="postEdit" value="postEdit" class="primary-button" type="submit">Сохранить изменения</button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/blog">Отмена</a>
    </div>
  </form>
</div>

<script>
  CKEDITOR.replace('editor', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>
