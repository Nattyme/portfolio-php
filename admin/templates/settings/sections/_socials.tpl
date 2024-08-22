<h3 class="admin-section-title">Социальные ссылки</h3>

<div class="admin-form__item" data-control="tab">
  <!-- Навигация -->
  <div class="tab__nav" data-control="tab-nav">
    <button type="button" class="tab__nav-button active" data-control="tab-button" 
            title="Перейти в редактирование ссылки на профиль youtube">
      Youtube
    </button>

    <button type="button" class="tab__nav-button" data-control="tab-button" 
            title="Перейти в редактирование ссылки на профиль instagram">
      Instagram
    </button>

    <button type="button" class="tab__nav-button" data-control="tab-button" 
            title="Перейти в редактирование ссылки на профиль facebook">
      Facebook
    </button>

    <button type="button" class="tab__nav-button" data-control="tab-button" 
            title="Перейти в редактирование ссылки на профиль vkontakte">
      Вконтакте
    </button>

    <button type="button" class="tab__nav-button" data-control="tab-button" 
            title="Перейти в редактирование ссылки на профиль linkedin">
      LinkedIn
    </button>

    <button type="button" class="tab__nav-button" data-control="tab-button" 
            title="Перейти в редактирование ссылки на профиль github">
      GitHub
    </button>
  </div>
  <!-- Навигация -->

  <!-- Блоки с контентом -->
  <div class="admin-form__item">
    <div class="tab__content" data-control="tab-content">
      <div class="tab__block active" data-control="tab-block">
        <label class="input__label">
          <input name="youtube" class="input input--width-label" type="text" placeholder="Введите ссылку на профиль youtube" value="<?= $settings['youtube'] ?>" />
        </label>
      </div>

      <div class="tab__block" data-control="tab-block">
        <label class="input__label">
            <input name="instagram" class="input input--width-label" type="text" placeholder="Введите ссылку на профиль instagram" value="<?= $settings['instagram'] ?>" />
        </label>
      </div>

      <div class="tab__block" data-control="tab-block">
        <label class="input__label">
          <input name="facebook" class="input input--width-label" type="text" placeholder="Введите ссылку на профиль facebook" value="<?= $settings['facebook'] ?>" />
        </label>
      </div>

      <div class="tab__block" data-control="tab-block">
        <label class="input__label">
          <input name="vkontakte" class="input input--width-label" type="text" placeholder="Введите ссылку на профиль vkontakte" value="<?= $settings['vkontakte'] ?>" />
        </label>
      </div>

      <div class="tab__block" data-control="tab-block">
        <label class="input__label">
          <input name="linkedin" class="input input--width-label" type="text" placeholder="Введите ссылку на профиль linkedin" value="<?= $settings['linkedin'] ?>" />
        </label>
      </div>
      
      <div class="tab__block" data-control="tab-block">
        <label class="input__label">
          <input name="github" class="input input--width-label" type="text" placeholder="Введите ссылку на профиль github" value="<?= $settings['github'] ?>" />
        </label>
      </div>
    </div>
  </div>
  <!--// Блоки с контентом -->
</div>



