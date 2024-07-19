<?php 
  function updateUserAndGoToProfile($user) {
    global $errors;
    if ( isset($_POST['updateProfile'])) {
      // Проверить поля на заполненность
      if ( trim($_POST['name']) === '') {
        $errors[] = ['title' => 'Введите имя'];
      }
      if ( trim($_POST['surname']) === '') {
        $errors[] = ['title' => 'Введите фамилию'];
      }
      if ( trim($_POST['email']) === '') {
        $errors[] = ['title' => 'Введите email'];
      }

      // Если ошибок нет - обновить данные в БД
      if ( empty($errors) ) {
        $user->name = htmlentities($_POST['name']);
        $user->surname = htmlentities($_POST['surname']);
        $user->email = htmlentities($_POST['email']);
        $user->country = htmlentities($_POST['country']);
        $user->city = htmlentities($_POST['city']);

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
      //Обновляем данные пользователя
      updateUserAndGoToProfile($user);

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