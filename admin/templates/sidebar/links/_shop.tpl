<li class="control-panel__list-item">
  <a href="?shop" class="control-panel__list-link" 
     title="Перейти страницу редактирования магазина"
     data-name="accordeon-title">
    <div class="control-panel__list-img-wrapper">
      <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/folder.svg" alt="icon" />
    </div>
    Магазин
  </a>
  <ul class="control-panel__list hidden">
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link control-panel__inner-link--active" 
        href="<?php echo HOST;?>admin/shop-new" title="Перейти на страницу добавления товара">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Добавить товар
      </a>
    </li>
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link control-panel__inner-link--active" 
        href="<?php echo HOST;?>admin/shop" title="Перейти на страницу всех товаров">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все товары
      </a>
    </li>
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="#">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Товары на редактировании
      </a>
    </li>
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/brand" title="Перейти на страницу редактирования брендов товаров">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/corner.svg" alt="icon" />
        </div>
        Бренды товаров
      </a>
    </li>
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/category?shop" title="Перейти на страницу редактирования категорий товаров">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/corner.svg" alt="icon" />
        </div>
        Категории товаров
      </a>
    </li>
  </ul>
</li>
