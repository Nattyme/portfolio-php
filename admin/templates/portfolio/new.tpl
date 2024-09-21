<script src="<?php echo HOST;?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

<form class="admin-form" method="POST" action="<?php echo HOST;?>admin/project-new" enctype="multipart/form-data">
  <div class="admin-form__item">
    <h2 class="heading">Добавление новой записи портфолио</h2>
  </div>
  <div class="admin-form__item">
    <label class="input__label">
      Введите название проекта
      <input name="title" class="input input--width-label" type="text" placeholder="Введите название" />
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
    <a class="secondary-button" href="<?php HOST;?>category-new?portfolio">Создать новую категорию</a>
  </div>

  <div class="admin-form__item">
  
  <label class="checkbox__title">
    Заполните технологии проекта:
  </label>
  <div class="checkbox__row">
    <?php foreach($technologies as $technology) : ?>
      <label class="checkbox__item">
          <input
              class="checkbox__btn"
              type="checkbox"
              name="<?php echo $technology['id'];?>"
              value="<?php echo $technology['title'];?>"
          >
          <span class="checkbox__label"><strong><?php echo $technology['title'];?></strong></span>
      </label>
    <?php endforeach;?>
  
  </div>
  
</div>

<div class="admin-form__item">
  <a class="secondary-button" href="<?php HOST;?>technology-new">Создать новую технологию</a>
</div>
  
  <div class="admin-form__item">
    <label class="textarea__label mb-15" name="editor">
      Описание проекта
    </label>
    <textarea name="about" class="textarea textarea--width-label" placeholder="Введите описание" id="editor"></textarea>
  </div>
  <div class="admin-form__item ">
    <label class="input__label">
      Время работы над проектом:
      <input name="deadline" class="input input--width-label" type="text" placeholder="Ведите время" />
    </label>
  </div>
  <div class="admin-form__item ">
    <label class="input__label input__label--details">
      Страниц сверстано:
      <input name="pages" class="input input--width-label" type="text" placeholder="Введите количество" />
    </label>
  </div>
  <div class="admin-form__item">
    <label class="input__label input__label--details">
      Бюджет проекта:
      <input name="budget" class="input input--width-label" type="text" placeholder="Введите сумму" />
    </label>
  </div>
 
  <div class="admin-form__item">
    <label class="input__label">
      Ссылка на проект проекта
      <input name="link" class="input input--width-label" type="text" placeholder="Введите ссылку" />
    </label>
  </div>
 
  <div class="admin-form__item">
    <div class="block-upload">
      <div class="block-upload__description">
        <div class="block-upload__title">Обложка проекта:</div>
        <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до 2Мб.</p>
        <div class="block-upload__file-wrapper">
          <input name="cover" class="file-button" type="file">
        </div>
      </div>
    </div>
  </div>

  <div class="admin-form__item buttons">
    <button name="postSubmit" value="postSubmit" class="primary-button" type="submit">
      Опубликовать
    </button>
    <a class="secondary-button" href="<?php echo HOST;?>admin/portfolio">Отмена</a>
  </div>
</form>
</div>


<script>
  CKEDITOR.replace('editor', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>
