<main class="page-profile">
  <!-- Если пользователя открывает profile без входа на сайт -->
  <?php if( isset($userNotLoggedIn)) : ?>
    <div class="section">
			<div class="container">
				<div class="section__title">
					<h2 class="heading mb-25">Профиль пользователя</h2>
          <p>Чтобы посмотреть свой профиль
            <a href="<?php echo HOST; ?>login">войдите</a>
            либо
            <a href="<?php echo HOST; ?>registration">зарегистрируйтесь</a>
          </p>
				</div>
			</div>
		</div>
  <!-- Если пользователя с таким ID не существует -->
  <?php elseif ($user['id'] === 0) : ?>
    <div class="section">
			<div class="container">
				<div class="section__title">
					<h2 class="heading">Такого пользователя не существует</h2>
          <p><a href="<?php echo HOST; ?>">Вернуться на главную</a></p>
				</div>
			</div>
		</div>
  <!--// Если пользователя с таким ID не существует -->
  
  <!-- Если пользователь НАЙДЕН -->
  <?php else : ?>
    <div class="section">
			<div class="container">
				<div class="section__title">
					<h2 class="heading">Профиль пользователя </h2>
				</div>
				<div class="section__body">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <?php include ROOT . "templates/components/errors.tpl"; ?>
              <?php include ROOT . "templates/components/success.tpl"; ?>
            </div>
          </div>

          <!-- Блок пустого профиля -->
          <?php if (empty($user->name)) : ?>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="enter-or-reg flex-column flex-row-gap">
                  <div class="enter-or-reg__text">
                      Пустой профиль 😑 
                  </div>
                  <!-- Кнопка редактирования профиля -->
                  <?php include ROOT . "templates/profile/_parts/button-edit-profile.tpl"; ?>
                </div>
              </div>
            </div>
          <!-- Заполненный профиль -->
          <?php else : ?>
            <div class="row justify-content-center">
              <div class="col-md-2">
                <div class="avatar-big">
                  <?php if ( !empty($user->avatar)) : ?>
                    <img src="<?php echo HOST; ?>usercontent/avatars/<?php echo $user->avatar; ?>" alt="Аватарка" />
                  <?php else : ?>
                    <img src="<?php echo HOST; ?>usercontent/avatars/no-avatar.svg" alt="Аватарка" />
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="definition-list mb-20">
                  <?php if (!empty($user->name)) : ?>
                    <dl class="definition">
                      <dt class="definition__term">имя и фамилия</dt>
                      <dd class="definition__description">
                        <?php echo $user->name; ?> 
                        <?php echo $user->surname; ?>
                      </dd>
                    </dl>
                  <?php endif; ?>

                  <?php if (!empty($user->country) || !empty($user->city)) : ?>
                    <dl class="definition">
                      <dt class="definition__term">
                        <?php if (!empty($user->country)) : ?>
                          Страна
                        <?php endif; ?>

                        <?php if (!empty($user->country) && !empty($user->city)) : ?>
                          ,
                        <?php endif; ?>

                        <?php if (!empty($user->city)) : ?>
                          город
                        <?php endif; ?>
                      </dt>
                      <dd class="definition__description">
                        <?php echo $user->country; ?> 
                        <?php if (!empty($user->country) && !empty($user->city)) : ?>
                          ,
                        <?php endif; ?>
                        <?php echo $user->city; ?>
                      </dd>
                    </dl>
                  <?php endif; ?>

                  <!-- Видно только владельцу профиля -->
                  <?php 
                   if ( isset($_SESSION['logged_user']) && 
                        $_SESSION['logged_user']['id'] === $user['id'] && 
                        !empty($user->phone) 
                      ) : 
                  ?>
                    <dl class="definition">
                      <dt class="definition__term">
                        Номер телефона
                      </dt>
                      <dd class="definition__description">
                        <?php echo $user->phone; ?> 
                      </dd>
                    </dl>
                  <?php endif; ?>
                  <?php 
                    if ( isset($_SESSION['logged_user']) && 
                         $_SESSION['logged_user']['id'] === $user['id'] && 
                         !empty($user->address) 
                        ) : 
                  ?>
                    <dl class="definition">
                      <dt class="definition__term">
                        Адрес доставки заказов
                      </dt>
                      <dd class="definition__description">
                        <?php echo $user->address; ?> 
                      </dd>
                    </dl>
                  <?php endif; ?>
                  <!-- // Видно только владельцу профиля -->
                </div>
                <!-- Кнопка редактирования профиля -->
                <?php include ROOT . "templates/profile/_parts/button-edit-profile.tpl"; ?>
              </div>
					  </div>
          <?php endif; ?>
				</div>
			</div>
		</div>
    <?php include ROOT . "templates/profile/_parts/user-comments.tpl";?>
  <?php endif; ?>
  <!--// Если пользователь НАЙДЕН -->
</main>