<?php 
  function updateUserAndGoToProfile($user) {
    if ( isset($_POST['updateProfile'])) {
      // Проверить поля на заполненность
      if ( trim($_POST['name']) === '') {
        $_SESSION['errors'][] = ['title' => 'Введите имя'];
      }
      if ( trim($_POST['surname']) === '') {
        $_SESSION['errors'][] = ['title' => 'Введите фамилию'];
      }
      if ( trim($_POST['email']) === '') {
        $_SESSION['errors'][] = ['title' => 'Введите email'];
      }

      // Если ошибок нет - обновить данные в БД
      if ( empty($_SESSION['errors']) ) {
        $user->name = htmlentities($_POST['name']);
        $user->surname = htmlentities($_POST['surname']);
        $user->email = htmlentities($_POST['email']);
        $user->country = htmlentities($_POST['country']);
        $user->city = htmlentities($_POST['city']);

        // Работа с файлом фотографии аватарки пользователя
        if( isset($_FILES['avatar']['name']) && $_FILES['avatar']['tmp_name'] !== '') {
          // 1. Записываем парам файла в переменные
          $fileName = $_FILES['avatar']['name'];
          $fileTmpLoc = $_FILES['avatar']['tmp_name'];
          $fileType = $_FILES['avatar']['type'];
          $fileSize = $_FILES['avatar']['size'];
          $fileErrorMsg = $_FILES['avatar']['error'];
          $kaboom = explode(".", $fileName);
          $fileExt = end($kaboom);

          // 2. Проверка файла на соответствие требованиям сайта к фото
          // 2.1 Проверка на маленький размер изображения
          list($width, $height) = getimagesize($fileTmpLoc);
          if ($width < 160 || $height <160 ) {
            $_SESSION['errors'][] = [
              'title' => 'Изображение слишком маленького размера',
              'desc' => 'Загрузите изображение побольше.'
            ];
          }
          // 2.2 Проверка на большой вес файла изображения
          if ($fileSize > 4194304) {
            $_SESSION['errors'][] = [
              'title' => 'Файл изображения не должен быть более 4 Mb'
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
            
          }

        }
        R::store($user);
        $_SESSION['logged_user'] = $user;
        header('Location: ' . HOST . 'profile');
        exit();
      }
    }
  }
  // Проверка на то, что юзер залогинен
  if( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
    // Юзер залогинен. Проверка на роль - пользователь или админ
    if( $_SESSION['logged_user']['role'] === 'user') {
      // Это обычный пользователь
      $user = R::load('users', $_SESSION['logged_user']['id']);
      updateUserAndGoToProfile($user);  //Обновляем данные пользователя

    } else if ( $_SESSION['logged_user']['role'] === 'admin') {
      // Это администратор сайта. Делаем проверку на доп парам - ID пользователя для редактирования
      if( isset($uriArray[1])) {
        //Редакт. чужого профиля. 
        $user = R::load('users', intval($uriArray[1]) ); // Загружаем данные о профиле
        //Обновляем данные пользователя
        updateUserAndGoToProfile($user);
      } else {
         // Редактирование своего профиля
        $user = R::load('users', $_SESSION['logged_user']['id']);
        updateUserAndGoToProfile($user);
      }
    }
  } else {
    header('Location: ' . HOST . 'login');
    exit();
  }

  // Запрос данныз из БД по юзеру
  $pageTitle = "Профиль пользователя";

  include ROOT . 'templates/page-parts/_head.tpl';
  include ROOT . "templates/_parts/_header.tpl";

  include ROOT . "templates/profile/profile-edit.tpl";

  include ROOT . "templates/_parts/_footer.tpl";
  include ROOT . 'templates/page-parts/_foot.tpl';