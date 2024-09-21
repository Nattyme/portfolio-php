<div class="admin-page__content-form">
  
  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <form enctype="multipart/form-data" class="admin-form" method="POST" action="<?php echo HOST;?>admin/technology-edit?id=<?php echo $technology['id']; ?>">
    <div class="admin-form__item">
      <h2 class="heading">Редактировать технологию</h2>
    </div>
    <div class="admin-form__item">
      <label class="input__label">
        Название технологии
        <input 
          name="title" 
          class="input input--width-label" 
          type="text" 
          placeholder="Заголовок бренда" 
          value="<?php echo $technology['title'];?>"
        />
      </label>
    </div>

    <div class="admin-form__item">
      <div class="block-upload">
        <div class="block-upload__description">
          <div class="block-upload__title">Добавить изображение</div>
          <p>Формат jpg или png, рекомендуемая ширина 68px и больше, высота от 68px и более. Вес до 2Мб.</p>
          <div class="block-upload__file-wrapper">
            <input name="cover" class="file-button" type="file">
          </div>
        </div>
      </div>
    </div>

    <div class="admin-form__item buttons">
      <button name="submit" value="submit" class="primary-button" type="submit">
        Сохранить изменения
      </button>
      <?php if (isset($_POST['postEdit'])) : ?>
        <a class="secondary-button" href="<?php echo HOST;?>admin/technology" title="К списку технологий">К списку технологий</a>
      <?php else : ?>
        <a class="secondary-button" href="<?php echo HOST;?>admin/technology" title="Отмена">Отмена</a>
      <?php endif; ?>
    </div>
  </form>
</div>

