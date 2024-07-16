<?php 
  $details = R::find('about', 1); 
  
  // echo "<pre>";
  // // print_r($details[1]);
  // echo $details[1]['name'];
  // echo $details[1]['description'];
  // echo "</pre>";

  $aboutName = $details[1]['name'];
  $aboutDesc = $details[1]['description'];

  $page_name = "Главная страница";
  $page_text = "Текст главной страницы";

  //Сохраняем код ниже в буфер
  ob_start();
  include ROOT . 'templates/main/main.tpl';
  
  //Записываем вывод из буфера в пепеменную
  $content = ob_get_contents();

  //Окончание буфера, очищаем вывод
  ob_end_clean();

  include ROOT . 'templates/_parts/_header.tpl';
  include ROOT . 'templates/template.tpl';
  include ROOT . 'templates/_parts/_footer.tpl';