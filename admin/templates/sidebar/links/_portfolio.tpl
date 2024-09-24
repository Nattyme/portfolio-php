<li class="control-panel__list-item">
  <a  class="control-panel__list-link" href="<?php echo HOST;?>admin/portfolio" 
      title="Перейти на страницу редактирования портфолио"
      data-name="accordeon-title">
    <div class="control-panel__list-img-wrapper">
      <img class="control-panel__list-img" src="<?php echo HOST; ?>static/img/control-panel/portfolio.svg" alt="icon" />
    </div>
    Портфолио
  </a>
  <ul class="control-panel__list hidden">

    <!-- Добавить новый проект -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link control-panel__inner-link--active" 
         href="<?php HOST;?>project-new">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Добавить новый проект
      </a>
    </li>
    <!--// Добавить новый проект -->
    
    <!-- Все проекты -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/portfolio" 
         title="Открыть список всех проектов порфолио">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все проекты
      </a>
    </li>
    <!--// Все проекты -->

    <!-- Все категории -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" 
         href="<?php echo HOST;?>admin/category?portfolio" 
         title="Перейти на страницу редактирования категорий проектов портфолио">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все категории
      </a>
    </li>
    <!--// Все категории -->

    <!-- Все технологии -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/technology" title="Перейти на страницу редактирования технологии">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/corner.svg" alt="icon" />
        </div>
        Все технологии
      </a>
    </li>
    <!--// Все технологии -->
  </ul>
</li>

