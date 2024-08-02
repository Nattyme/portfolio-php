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
          <?php /* echo num_decline( count($comments), ['Запись', 'Записи', 'Записей']); */?> 
          Записей в блоге
        </div>
        <div class="dashboard-item__value">15</div>
        <div class="dashboard-item__action">
          <a href="#" class="secondary-button">Добавить пост</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <?php /* echo num_decline( count($comments), ['Категория', 'Категории', 'Категорий']); */?> 
          Категорий в блоге</div>
        <div class="dashboard-item__value">14</div>
        <div class="dashboard-item__action">
          <a href="#" class="secondary-button">Добавить категорию</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <?php /* echo num_decline( count($comments), ['Комментарий', 'Комментария', 'Комментариев']); */?> 
          Комментарий в блоге
        </div>
        <div class="dashboard-item__value">15</div>
        <div class="dashboard-item__action">
          <a href="#" class="secondary-button">Добавить пост</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <?php /* echo num_decline( count($comments), ['Проект', 'Проекта', 'Проектов']); */?> 
          Проектов в портфолио
        </div>
        <div class="dashboard-item__value">5</div>
        <div class="dashboard-item__action">
          <a href="#" class="secondary-button">Добавить проект</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
        <?php /* echo num_decline( count($comments), ['Пользователь', 'Пользователя', 'Пользователей']); */?> 
          Пользователей
        </div>
        <div class="dashboard-item__value">9</div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <?php /* echo num_decline( count($comments), ['Сообщение', 'Сообщения', 'Сообщений']); */?> 
          Сообщений
        </div>
        <div class="dashboard-item__value">5</div>
      </section>
  </div>

  </div>
</div>