<form enctype="multipart/form-data" method="POST" action="<?php echo HOST; ?>contacts" class="feedback-form" autocomplete="on">

  <?php include ROOT . "templates/components/errors.tpl"; ?>
  <?php include ROOT . "templates/components/success.tpl"; ?>

  <div class="feedback-form__heading">
    <h2 class="heading">Напишите мне </h2>
  </div>
  <div class="feedback-form__input">
    <?php if (isset($_POST['name']) && !empty($_POST['name'])) : ?>
      <input name="name" class="input" type="text" placeholder="Ваше имя" value="<?php echo $_POST['name'];?>"/>
    <?php else : ?>
      <input name="name" class="input" type="text" placeholder="Ваше имя"/>
    <?php endif;?>
  </div>
  <div class="feedback-form__input">
    <?php if (isset($_POST['email']) && !empty($_POST['email'])) : ?>
      <input name="email" class="input" type="text" placeholder="Email" value="<?php echo $_POST['email'];?>"/>
    <?php else : ?>
      <input name="email" class="input" type="text" placeholder="Email"/>
    <?php endif; ?>
  </div>
  <div class="feedback-form__input">
  <?php if (isset($_POST['message']) && !empty($_POST['message'])) : ?>
    <textarea name="message" class="textarea" placeholder="Введите сообщение"><?php echo $_POST['message'];?></textarea>
  <?php else : ?>
    <textarea name="message" class="textarea" placeholder="Введите сообщение"></textarea>
  <?php endif; ?>
  </div>
  <div class="feedback-form__upload">
    <div class="block-upload">
      <div class="block-upload__description">
        <div class="block-upload__title">Прикрепить файл:</div>
        <p>jpg, png, pdf, вес до 2 Мб</p>
        <div class="block-upload__file-wrapper">
          <input name="file" class="file-button" type="file">
        </div>
      </div>
    </div>
  </div>
  <button class="primary-button" type="submit" name="submit">Отправить</button>
</form>