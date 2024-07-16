<?php
//Проверка, что массив $errors не пустой, значит есть ошибки на вывод
  if ( !empty($errors) ) :

    //Обходим массив, выводя каждую ошибку
    foreach ($errors as $error) :

      //Если в ошибке только заголовок
      if ( count($error) == 1 ) : 
        ?>
          <div class="notifications mb-20">
            <div class="notifications__title notifications__title--error"><?php echo $error['title']; ?></div>
          </div>
        <?php

      //Если в ошибке только заголовок с описанием
      elseif ( count($error) == 2 ) :
        ?>
          <div class="notifications__title notifications__title--error mb-20"><?php echo $error['title']; ?></div>
            <div class="notifications__message">
              <?php echo $error['desc']; ?>         
            </div>
          </div>
        <?php 

      endif;

    endforeach;

  endif;