<div class="admin-page_content-form">
  <div class="admin-form" style="width: 900px">

  <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
  <?php include ROOT . "admin/templates/components/success.tpl"; ?>

  <div class="admin-form_item d-flex justify-content-between mb-20">
      <h1>Админ панель</h1>
  </div>

  <div class="dashboard">
      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <a href="<?php echo HOST; ?>admin/blog">
            <?php echo num_decline( $postCount, ['Запись', 'Записи', 'Записей']); ?> 
            в блоге
          </a>
        </div>
        <div class="dashboard-item__value"><?php echo $postCount;?></div>
        <div class="dashboard-item__action">
          <a href="<?php echo HOST; ?>admin/post-new" class="secondary-button">Добавить пост</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <a href="<?php echo HOST; ?>admin/category">
            <?php echo num_decline( $categoriesCount, ['Категория', 'Категории', 'Категорий']); ?> 
            в блоге
          </a>
        </div>
        <div class="dashboard-item__value"><?php echo $categoriesCount;?></div>
        <div class="dashboard-item__action">
          <a href="<?php echo HOST; ?>admin/category-new" class="secondary-button">Добавить категорию</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <a href="<?php echo HOST; ?>admin/comments">
            <?php echo num_decline( $commentsCount, ['Комментарий', 'Комментария', 'Комментариев']); ?> 
            в блоге
          </a>
        </div>
        <div class="dashboard-item__value"><?php echo $commentsCount;?></div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <a href="<?php echo HOST; ?>admin/portfolio">
            <?php echo num_decline( $projectsCount, ['Проект', 'Проекта', 'Проектов']); ?> 
            в портфолио
          </a>
        </div>
        <div class="dashboard-item__value"><?php echo $projectsCount;?></div>
        <div class="dashboard-item__action">
          <a href="<?php echo HOST; ?>admin/project-new" class="secondary-button">Добавить проект</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
        <a href="<?php echo HOST; ?>admin/portfolio">
          <?php echo num_decline( $userCount, ['Пользователь', 'Пользователя', 'Пользователей']); ?> 
        </a>
        </div>
        <div class="dashboard-item__value"><?php echo $userCount;?></div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <a href="<?php echo HOST; ?>admin/messages">
            <?php echo num_decline( $messagesTotalCount, ['Сообщение', 'Сообщения', 'Сообщений']); ?> 
          </a>
        </div>
        <div class="dashboard-item__value"><?php echo $messagesTotalCount;?></div>
      </section>
  </div>

  </div>
</div>