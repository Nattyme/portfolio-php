<li class="control-panel__list-item">
  <a href="?blog" class="control-panel__list-link"  
     title="Перейти на страницу редактирования блога" 
     data-name="accordeon-title">
    <div class="control-panel__list-img-wrapper">
      <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/book.svg" alt="icon" />
    </div>
    Блог
  </a>
  <ul class="control-panel__list hidden">
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link control-panel__inner-link--active" 
         href="<?php HOST;?>post-new">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Добавить пост
      </a>
    </li>
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php HOST;?>category-new?blog" title="Перейти на страницу редактирования категорий публикаций">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Добавить категорию
      </a>
    </li>
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/blog">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все записи
      </a>
    </li>
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/category?blog" title="Перейти на страницу редактирования категорий публикаций">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все категории
      </a>
    </li>
  </ul>
</li>


   