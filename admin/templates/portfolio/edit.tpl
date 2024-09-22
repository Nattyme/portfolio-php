<script src="<?php echo HOST;?>libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

<form class="admin-form" method="POST" action="<?php echo HOST;?>admin/project-edit?id=<?php echo $project['id'];?>" enctype="multipart/form-data">
  <div class="admin-form__item">
    <h2 class="heading">Редактирование записи портфолио</h2>
  </div>
  <div class="admin-form__item">
    <label class="input__label">
      Введите название проекта
      <input name="title" class="input input--width-label" type="text" placeholder="Введите название" value="<?php echo $project['title'] ;?>"/>
    </label>
  </div>

  <div class="admin-form__item">
    <label class="select-label">Выберите категорию 
      <select class="select" name="cat">
        <?php foreach ($cats as $cat) : ?>
          <option 
            <?php echo $project['cat'] == $cat['id'] ? 'selected' : '';?> 
            value=<?php echo $cat['id'];?>><?php echo $cat['title'];?>
          </option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  
  <div class="admin-form__item">
    <label class="textarea__label mb-15" name="editor">
      Описание проекта
    </label>
    <textarea name="about" class="textarea textarea--width-label" placeholder="Введите описание" id="about">
      <?php echo $project['about'] ;?>
    </textarea>
  </div>
  <div class="admin-form__item">
    <label class="input__label input__label--details">
      Время работы над проектом:
      <input name="deadline" class="input input--width-label" type="text" placeholder="Ведите время" value="<?php echo $project['deadline'] ;?>"/>
    </label>
  </div>
  <div class="admin-form__item">
    <label class="input__label input__label--details">
      Страниц сверстано:
      <input name="pages" class="input input--width-label" type="text" placeholder="Введите количество" value="<?php echo $project['pages'] ;?>"/>
    </label>
  </div>
  <div class="admin-form__item">
    <label class="input__label input__label--details">
      Бюджет проекта:
      <input name="budget" class="input input--width-label" type="text" placeholder="Введите сумму" value="<?php echo $project['budget'] ;?>"/>
    </label>
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
                <?php foreach($currentTechnologies as $currentTech) {
                  echo isset($currentTech) &&  $technology['id'] === $currentTech['id'] ? 'checked' : NULL; 
                } ?>
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
    <label class="input__label">
      Ссылка на проект проекта
      <input name="link" class="input input--width-label" type="text" placeholder="Введите ссылку" value="<?php echo $project['link'] ;?>"/>
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
    <?php if (!empty($project->cover)) : ?>
      <div class="block-upload__img">
        <img src="<?php echo HOST . 'usercontent/portfolio/' . $project['coverSmall'];?>" alt="Загрузка картинки" />
      </div>
      <label class="checkbox__item mt-15">
        <input class="checkbox__btn" type="checkbox" name="delete-cover">
        <span class="checkbox__label">Удалить обложку</span>
      </label>
    <?php endif;?>
  </div>
  

  <div class="admin-form__item buttons">
    <button name="postEdit" value="postEdit" class="primary-button" type="submit">
      Сохранить изменения
    </button>
    <?php if (isset($_POST['postEdit'])) : ?>
      <a class="secondary-button" href="<?php echo HOST;?>admin/portfolio" title="Вернуться к списку проектов">К списку проектов</a>
    <?php else : ?>
      <a class="secondary-button" href="<?php echo HOST;?>admin/portfolio" title="Отмена">Отмена</a>
    <?php endif; ?>
  </div>
</form>
</div>


<script>
  CKEDITOR.replace('about', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>
<script>
  CKEDITOR.replace('tools', {
    filebrowserUploadMethod: 'form',
    filebrowserUploadUrl: '<?php echo HOST;?>libs/ck-upload/upload.php'
  });
</script>
