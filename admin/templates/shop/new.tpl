<script src="<?php echo HOST;?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form class="admin-form" method="POST" action="<?php echo HOST;?>admin/shop-new" enctype="multipart/form-data">
    <div class="admin-form__item">
      <h2 class="heading">Добавить новый товар</h2>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Введите название товара
        <input name="title" class="input input--width-label" type="text"/>
      </label>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Цена товара
        <input name="price" class="input input--width-label" type="text"/>
      </label>
    </div>
    <div class="admin-form__item">
      <label class="select-label">Выберите категорию 
        <select class="select" name="cat">
          <?php foreach ($cats as $cat) : ?>
            <option value="<?php echo $cat['id'];?>"><?php echo $cat['title'];?></option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
    <div class="admin-form__item">
      <label class="textarea__label mb-15" name="editor">
        Описание товара
      </label>
      <textarea name="content" class="textarea textarea--width-label" id="editor"></textarea>
    </div>
    <div class="admin-form__item">
      <div class="block-upload">
        <div class="block-upload__description">
          <div class="block-upload__title">Фотография товара</div>
          <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до 2Мб.</p>
          <div class="block-upload__file-wrapper">
            <input name="cover" class="file-button" type="file">
          </div>
        </div>
      </div>
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">
        Опубликовать
      </button>
      <a class="secondary-button" href="<?php echo HOST;?>admin/shop">Отмена</a>
    </div>
  </form>
</div>

<script>
  CKEDITOR.replace('editor', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>
