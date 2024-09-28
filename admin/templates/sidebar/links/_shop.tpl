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

    <!-- Добавить товар -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" 
        href="<?php echo HOST;?>admin/shop-new" title="Перейти на страницу добавления товара">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Добавить товар
      </a>
    </li>
    <!--// Добавить товар -->

    <!--  Все товары -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" 
        href="<?php echo HOST;?>admin/shop" title="Перейти на страницу всех товаров">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST . 'static/img/control-panel/corner.svg';?>" alt="icon" />
        </div>
        Все товары
      </a>
    </li>
    <!--//  Все товары -->


    <!-- Все бренды -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/brand" title="Перейти на страницу редактирования брендов товаров">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/corner.svg" alt="icon" />
        </div>
        Все бренды
      </a>
    </li>
    <!--//  Все бренды -->

    <!-- Все категории -->
    <li class="control-panel__list-item">
      <a class="control-panel__list-link control-panel__inner-link" href="<?php echo HOST;?>admin/category?shop" title="Перейти на страницу редактирования категорий товаров">
        <div class="control-panel__list-img-wrapper">
          <img class="control-panel__list-img" src="<?php echo HOST;?>static/img/control-panel/corner.svg" alt="icon" />
        </div>
        Все категории
      </a>
    </li>
    <!-- Все категории -->
  </ul>
</li>
