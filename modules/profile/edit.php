<?php 
  $pageTitle = "Профиль пользователя";

  // //Сохраняем код ниже в буфер
  // ob_start();
  // include ROOT . 'templates/about/about.tpl';
  
  // //Записываем вывод из буфера в пепеменную
  // $content = ob_get_contents();

  // //Окончание буфера, очищаем вывод
  // ob_end_clean();


  include ROOT . 'templates/page-parts/_head.tpl';
  include ROOT . "templates/_parts/_header.tpl";

  include ROOT . "templates/profile/profile-edit.tpl";

  include ROOT . "templates/_parts/_footer.tpl";
  include ROOT . 'templates/page-parts/_foot.tpl';