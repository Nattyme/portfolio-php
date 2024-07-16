<form class="authorization-form" method="POST" action="<?php echo HOST; ?>registration">
  <div class="authorization-form__heading">
    <h2 class="heading">Регистрация </h2>
  </div>

  <?php

  //Проверка, что массив $errors не пустой, значит есть ошибки на вывод
    if ( !empty($errors) ) :

      //Обходим массив, выводя каждую ошибку
      foreach ($errors as $error) :

        //Если в ошибке только заголовок
        if ( count($error) == 1 ) : 
          ?>
            <div class="notifications">
	            <div class="notifications__title notifications__title--error"><?php echo $error['title']; ?></div>
            </div>
          <?php

        //Если в ошибке только заголовок с описанием
        elseif ( count($error) == 2 ) :
          ?>
            <div class="notifications__title notifications__title--error"><?php echo $error['title']; ?></div>
              <div class="notifications__message">
                <?php echo $error['desc']; ?>         
              </div>
            </div>
          <?php 

        endif;

      endforeach;

    endif;
  ?>

  <div class="authorization-form__input">
    <input name="email" class="input" type="text" placeholder="Email" />
  </div>
  <div class="authorization-form__input">
    <input name="password" class="input" type="password" placeholder="Пароль" />
  </div>
  <div class="authorization-form__button">
    <button name="register" value="register" class="primary-button" type="submit">Зарегистрироваться</button>
  </div>
  <div class="authorization-form__links"><a>Вход на сайт</a></div>
</form>