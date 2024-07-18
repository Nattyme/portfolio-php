<form class="authorization-form" method="POST" action="<?php echo HOST; ?>registration">
  <div class="authorization-form__heading">
    <h2 class="heading">Регистрация </h2>
  </div>

  <?php include ROOT . "templates/components/errors.tpl"; ?>
  <?php include ROOT . "templates/components/success.tpl"; ?>

  <?php 
    if(!$success) {
  ?>
      <div class="authorization-form__input">
        <?php if( isset($_POST['register']) && !empty(trim($_POST['email']))) : ?>
          <input name="email" class="input" type="text" value="<?php echo $_POST['email'];?>" />
        <?php else: ?>
          <input name="email" class="input" type="text" placeholder="Email" />
        <?php endif; ?>
      </div>

      <div class="authorization-form__input">
        <input name="password" class="input" type="password" placeholder="Пароль" />
      </div>

      <div class="authorization-form__button">
        <button name="register" value="register" class="primary-button" type="submit">Зарегистрироваться</button>
      </div>
  <?php
    }
  ?>

  <div class="authorization-form__links">
    <a href="<?php echo HOST.'login'; ?>">Вход на сайт</a>
  </div>
</form>
