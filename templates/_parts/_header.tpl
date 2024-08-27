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
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>portfolio" title="Перейти в раздел портфолио">Портфолио</a></li>
        <li class="nav__list-item">
          <a class="nav__list-item-link" href="<?php echo HOST;?>blog" title="Перейти в блог">
            Блог
          </a>
          <div class="nav__list-item__sub-nav">
            <ul class="sub-nav">
              <?php foreach ($category_post as $category) : ?>
                <li class="sub-nav__item">
                  <a href="<?php echo HOST . 'blog/cat/' . $category['id']; ?>" class="sub-nav__link">
                    <?php echo $category['title'];?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </li>
        <li class="nav__list-item">
          <a class="nav__list-item-link nav__list-item-link--dropdown" href="<?php echo HOST;?>shop" title="Перейти в магазин">
            Магазин
          </a>
          <div class="nav__list-item__sub-nav">
            <ul class="sub-nav">
              <?php foreach ($category_shop as $category) : ?>
                <li class="sub-nav__item">
                  <a href="<?php echo HOST . 'shop/cat/' . $category['id']; ?>" class="sub-nav__link">
                    <?php echo $category['title'];?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </li>
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>contacts" title="Перейти в раздел контакты">Контакты</a></li>
      </ul>
    </nav>
  </div>
</header>