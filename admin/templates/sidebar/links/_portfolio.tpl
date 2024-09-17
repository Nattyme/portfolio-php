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
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link control-panel__inner-link--active" 
         href="<?php HOST;?>project-new">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Добавить новый проект
      </a>
    </li>
    
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/portfolio" 
         title="Открыть список всех проектов порфолио">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все проекты
      </a>
    </li>

    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php HOST;?>category-new?portfolio" 
         title="Перейти на страницу редактирования категорий проектов портфолио">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Добавить категорию
      </a>
    </li>
    
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" 
         href="<?php echo HOST;?>admin/category?blog" 
         title="Перейти на страницу редактирования категорий проектов портфолио">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все категории
      </a>
    </li>

    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/technology" title="Перейти на страницу редактирования технологии">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/corner.svg" alt="icon" />
        </div>
        Технологии
      </a>
    </li>
  </ul>
</li>

