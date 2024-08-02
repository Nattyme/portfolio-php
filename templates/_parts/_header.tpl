<!-- sticky-footer-content -->
<div class="sticky-footer-content">

<?php include ROOT . "templates/_parts/_admin-panel.tpl"; ?>

<header class="section-header">
  <div class="section-header__content">
    <a class="logo-link" href="<?php HOST;?>">
      <h2 class="section-header__content-title"><?php echo $settings['site_title'];?></h2>
      <p class="section-header__content-subtitle"><?php echo $settings['site_slogan'];?></p>
    </a>
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>about">Обо мне</a></li>
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>portfolio">Портфолио</a></li>
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>blog">Блог</a></li>
        <li class="nav__list-item"><a class="nav__list-item-link" href="<?php echo HOST;?>contacts">Контакты</a></li>
      </ul>
    </nav>
  </div>
</header>