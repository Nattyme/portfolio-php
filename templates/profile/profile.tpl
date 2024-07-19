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
						<div class="col-md-2">
							<div class="avatar-big"><img src="<?php echo HOST; ?>static/img/section-about-me/img-01.jpg" alt="Аватарка" /></div>
						</div>
						<div class="col-md-4">
							<div class="definition-list mb-20">
								<dl class="definition">
									<dt class="definition__term">имя и фамилия</dt>
									<dd class="definition__description"><?php echo $user->name; ?> <?php echo $user->surname; ?></dd>
								</dl>
								<dl class="definition">
									<dt class="definition__term">Страна, город</dt>
									<dd class="definition__description"><?php echo $user->country; ?> <?php echo $user->city; ?></dd>
								</dl>
							</div>
              <!-- Показываем кнопку редактировать только залогиненому пользователю -->
              <!-- Только владельцу профиля или админу -->
              <?php 
              print_r($_SESSION['logged_user']['role']);
                if ( 
                  isset($_SESSION['login']) 
                  && $_SESSION['login'] === 1
                  && ($_SESSION['logged_user']['id'] == $user->id || $_SESSION['logged_user']['role'] === 'admin' )
                ) :
              ?>
                <a class="secondary-button" href="<?php echo HOST; ?>profile-edit">Редактировать</a>
              <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section bg-grey">
			<div class="container">
				<div class="section__title">
					<h2 class="heading">Комментарии пользователя </h2>
				</div>
				<div class="section__body">
					<div class="row justify-content-center">
						<div class="col-md-10">
							<div class="comment">
								<div class="comment__avatar"><a href="#">
										<div class="avatar-small"><img src="<?php echo HOST; ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
									</a>
								</div>
								<div class="comment__data">
									<div class="comment__user-info">
										<div class="comment__username">Джон До</div>
										<div class="comment__date"><img src="<?php echo HOST; ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
									</div>
									<div class="comment__text">
										<p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
									</div>
								</div>
							</div>
							<div class="comment">
								<div class="comment__avatar"><a href="#">
										<div class="avatar-small"><img src="<?php echo HOST; ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
									</a>
								</div>
								<div class="comment__data">
									<div class="comment__user-info">
										<div class="comment__username">Джон До</div>
										<div class="comment__date"><img src="<?php echo HOST; ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
									</div>
									<div class="comment__text">
										<p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
									</div>
								</div>
							</div>
							<div class="comment">
								<div class="comment__avatar"><a href="#">
										<div class="avatar-small"><img src="<?php echo HOST; ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
									</a>
								</div>
								<div class="comment__data">
									<div class="comment__user-info">
										<div class="comment__username">Джон До</div>
										<div class="comment__date"><img src="<?php echo HOST; ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
									</div>
									<div class="comment__text">
										<p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  <?php endif; ?>
  <!--// Если пользователь НАЙДЕН -->

</main>