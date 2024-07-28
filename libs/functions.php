<?php
// Поиск названия модуля для Админки 
function getModuleNameForAdmin() {
  $uri = $_SERVER['REQUEST_URI'];
  $uriArr = explode('?', $uri); // Разбиваем запрос по сиволу '?', чтобы отсечь GET запрос
  $uri = $uriArr[0]; //  /admin/blog?id=15 => /admin/blog
  $uri = rtrim($uri, "/"); // Обрезаем сивол '/' в конце /admin/blog/ => /admin/blog
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе admin/blog
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса

  // Еще раз разбиваем строку запроса по символу "/",  получаем массив 
  // admin/blog => ['admin, 'blog']
  $moduleNameArr = explode('/', $uri);
  $uriModule = isset($moduleNameArr[1]) ? $moduleNameArr[1] : null; // Достаем имя модуля кот нужно запустить  admin/blog => blog
  return $uriModule; // blog Какой модуль запускаем
}

// Поиск названия модуля
function getModuleName () {
  $uri = $_SERVER['REQUEST_URI'];
  $uriArr = explode('?', $uri); // Разбиваем запрос по сиволу '?', чтобы отсечь GET запрос
  $uri = $uriArr[0]; //  /admin/blog?id=15 => /admin/blog
  $uri = rtrim($uri, "/"); // Обрезаем сивол '/' в конце /admin/blog/ => /admin/blog
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе admin/blog
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса

  // Еще раз разбиваем строку запроса по символу "/",  получаем массив 
  $moduleNameArr = explode('/', $uri); // admin/blog => ['admin, 'blog']
  $uriModule = $moduleNameArr[0]; // Достаем имя модуля кот нужно запустить  admin/blog => blog
  return $uriModule; // blog Какой модуль запускаем
}

// Аналог get запроса из URI
function getUriGet () {
  $uri = $_SERVER['REQUEST_URI'];
  $uri = rtrim($uri, "/"); // Удаляем сивол / в конце строки
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе
  $uri = explode('?', $uri);
  $uri = $uri[0];
  $uriArr = explode('/', $uri);
  $uriGet = isset($uriArr[1]) ? $uriArr[1] : null; 
  return $uriGet;
}

function getUriGetParam () {
  $uri = $_SERVER['REQUEST_URI'];
  $uri = rtrim($uri, "/"); // Удаляем сивол / в конце строки 'site.ru/' => 'site.ru'
  $uri = filter_var($uri, FILTER_SANITIZE_URL); // Удалем лишние сиволы из запроса
  $uri = substr($uri, 1); //Удаляем первый символ (слэш) в запросе
  $uri = explode('?', $uri); // ['blog/cat/5', 'id=20']
  $uri = $uri[0];// ['blog/cat/5']
  $uriArr = explode('/', $uri); // ['blog', 'cat', '5']
  $uriGet = isset($uriArr[2]) ? $uriArr[2] : null; 
  return $uriGet; // ['blog/cat/5'] => 5
}

function rus_date () {
  // Перевод
  $translate = array(
		"am" => "дп",
		"pm" => "пп",
		"AM" => "ДП",
		"PM" => "ПП",
		"Monday" => "Понедельник",
		"Mon" => "Пн",
		"Tuesday" => "Вторник",
		"Tue" => "Вт",
		"Wednesday" => "Среда",
		"Wed" => "Ср",
		"Thursday" => "Четверг",
		"Thu" => "Чт",
		"Friday" => "Пятница",
		"Fri" => "Пт",
		"Saturday" => "Суббота",
		"Sat" => "Сб",
		"Sunday" => "Воскресенье",
		"Sun" => "Вс",
		"January" => "Января",
		"Jan" => "Янв",
		"February" => "Февраля",
		"Feb" => "Фев",
		"March" => "Марта",
		"Mar" => "Мар",
		"April" => "Апреля",
		"Apr" => "Апр",
		"May" => "Мая",
		"May" => "Мая",
		"June" => "Июня",
		"Jun" => "Июн",
		"July" => "Июля",
		"Jul" => "Июл",
		"August" => "Августа",
		"Aug" => "Авг",
		"September" => "Сентября",
		"Sep" => "Сен",
		"October" => "Октября",
		"Oct" => "Окт",
		"November" => "Ноября",
		"Nov" => "Ноя",
		"December" => "Декабря",
		"Dec" => "Дек",
		"st" => "ое",
		"nd" => "ое",
		"rd" => "е",
		"th" => "ое"
  );
  // если передали дату, то переводим её
  if ( func_num_args() > 1 ) {
      return strtr(date(func_get_arg(0), func_get_arg(1)), $translate);
  } 
  // Иначе генерируем текущее время по шаблону
  else {
      return strtr(date(func_get_arg(0)), $translate);
  }
}

// pagination (6, 'posts');
// pagination (6, 'posts', [' cat = ? ', [4] ]);
function pagination ($results_per_page, $type, $params = NULL) {
  if ( empty($params)) {
    $number_of_results = R::count($type);
  } else {
    $number_of_results = R::count($type, $params[0], $params[1]); // Вернет кол-во постов
  }

  // Считаем кол-во страниц пагинации
  // $number_of_results = R::count($type); // Вернет кол-во постов
  $number_of_pages = ceil($number_of_results / $results_per_page); // ceil округляет число в бол. сторону

  // Определяем текущий номер запрашиваемой страницы 
  if ( !isset($_GET['page'])) {
    $page_number = 1;
  } else {
    $page_number = intval($_GET['page']); // 2ая стр. пагинации
  }

  // Если текущий номер страницы больше общего кол-ва страниц - показываем последнюю доступную
  if($page_number > $number_of_pages) {
    $page_number = $number_of_pages;
  }

  // Определяем с какого поста начать вывод
  $starting_limit_number = ($page_number-1) * $results_per_page; // (2-1) * 6 = 6;

  // Формируем подстроку для sql запроса
  $sql_page_limit = "LIMIT {$starting_limit_number}, {$results_per_page}";
  
  // Результирующий массив с параметрами
  $result['number_of_pages'] = $number_of_pages;
  $result['page_number'] = $page_number;
  $result['sql_page_limit'] =  $sql_page_limit;

  return $result;
}

/* **Работа с файлами. Сохранение изображения** */
// saveUploaddedImg("cover", [600, 300], 12, 'blog', [1110, 460], [290, 230]) 
function saveUploadedImg($inputFileName, $minSize, $maxFileSizeMb, $folderName, $fullSize, $smallSize) {
    /* 
      1. Имя файла из формы | string
      2. Мин. размер по ширине , мин. размер по высоте | array
      3. Мах. размер в MB | integer
      4. Название папки для сохран. файла | string
      5. Размеры болшьшой версии изображения | array
      6. Размеры маленькой версии изображени | array 
    */
  if( isset($_FILES[$inputFileName]['name']) && $_FILES[$inputFileName]['tmp_name'] !== '') {
    // 1. Записываем парам-ры файла в переменные
    $fileName = $_FILES[$inputFileName]['name'];
    $fileTmpLoc = $_FILES[$inputFileName]['tmp_name'];
    $fileType = $_FILES[$inputFileName]['type'];
    $fileSize = $_FILES[$inputFileName]['size'];
    $fileErrorMsg = $_FILES[$inputFileName]['error'];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);

    // 2. Проверка файла на соответствие требованиям сайта к фото
    // 2.1 Проверка на маленький размер изображения
    list($width, $height) = getimagesize($fileTmpLoc);

    if ($width < $minSize[0] || $height < $minSize[1] ) {
      $_SESSION['errors'][] = [
        'title' => 'Изображение слишком маленького размера',
        'desc' => 'Загрузите изображение с размерами от 600x300 и более.'
      ];
    }

    // 2.2 Проверка на большой вес файла изображения
    if ($fileSize > ($maxFileSizeMb * 1024 * 1024)) {
      $_SESSION['errors'][] = [
        'title' => 'Файл изображения не должен быть более 12 Mb'
      ];
    }

    // 2.3 Проверка на формат файла
    if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
      $_SESSION['errors'][] = [
        'title'=> 'Недопустимый формат файла',
        'desc'=> '<p>Файл изображения должен быть в формате gif, jpg, jpeg или png.</p>'
      ];
    }

    // 2.4 Проверка на иную ошибку
    if ($fileErrorMsg == 1) {
      $_SESSION['errors'][] = ['title' => 'При загрузке файла произошла ошибка. Повторите попытку.'];
    }

    // Если ошибок нет
    if ( empty($_SESSION['errors']) ) {
      // Прописываем путь для хранения изображения
      $imgFolderLocation = ROOT . "usercontent/{$folderName}/";

      $db_file_name = rand(100000000000,999999999999) . "." . $fileExt;
      $filePathFullSize = $imgFolderLocation . $db_file_name;
      $filePathSmallSize = $imgFolderLocation . $smallSize[0] . '-' . $db_file_name;

      // Обработать фотографию
      // 1. Обрезать до мах размера
      $resultFullSize = resize_and_crop($fileTmpLoc, $filePathFullSize, $fullSize[0], $fullSize[1]);
      // 2. Обрезать до мин размера
      $resultSmallSize = resize_and_crop($fileTmpLoc, $filePathSmallSize, $smallSize[0], $smallSize[1]);

      if ($resultFullSize != true || $resultSmallSize != true) {
        $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
        return false;
      }

      return [$db_file_name, $smallSize[0] . '-' . $db_file_name,];
    }
  }
}



















