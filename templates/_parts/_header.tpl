<!-- sticky-footer-content -->
<div class="sticky-footer-content">

<?php include ROOT . "templates/_parts/_admin-panel.tpl"; ?>

<header class="section-header">
  <div class="section-header__content">
    <a class="logo-link" href="<?php echo HOST;?>" title='Перейти на главную страницу сайта'>
      <h2 class="section-header__content-title"><?php echo $settings['site_title'];?></h2>
      <p class="section-header__content-subtitle"><?php echo $settings['site_slogan'];?></p>
    </a>
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>main" title="Перейти на главную страницу">Главная</a></li>
        <li class="nav__list-item">
          <a class="nav__list-item-link nav__list-item-link--dropdown" href="<?php echo HOST;?>portfolio" title="Перейти в раздел портфолио">
            Портфолио
            <div class="nav__list-item__icon">
              <img src="<?php echo HOST . 'static/img/icons/arrow-down.svg';?>" alt="Стрелка раскрывающегося меню">
            </div>
          </a>
          <div class="nav__list-item__sub-nav">
            <ul class="sub-nav">
              <?php include ROOT . "templates/_parts/sub-nav/_portfolio.tpl"; ?>
            </ul>
          </div>
        </li>
        <li class="nav__list-item"> 
          <a class="nav__list-item-link nav__list-item-link--dropdown" href="<?php echo HOST;?>blog" title="Перейти в блог">
            Блог
            <div class="nav__list-item__icon">
              <img src="<?php echo HOST . 'static/img/icons/arrow-down.svg';?>" alt="Стрелка раскрывающегося меню">
            </div>
          </a>
          <div class="nav__list-item__sub-nav">
            <ul class="sub-nav">
              <?php include ROOT . "templates/_parts/sub-nav/_blog.tpl"; ?>
            </ul>
          </div>
        </li>
        <li class="nav__list-item">
          <a class="nav__list-item-link nav__list-item-link--dropdown" href="<?php echo HOST;?>shop" title="Перейти в магазин">
            Магазин
            <div class="nav__list-item__icon">
              <img src="<?php echo HOST . 'static/img/icons/arrow-down.svg';?>" alt="Стрелка раскрывающегося меню">
            </div>
          </a>
          <div class="nav__list-item__sub-nav">
            <ul class="sub-nav">
              <?php include ROOT . "templates/_parts/sub-nav/_shop.tpl"; ?>
            </ul>
          </div>
        </li>
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>contacts" title="Перейти в раздел контакты">Контакты</a></li>
      </ul>
    </nav>
  </div>
</header>