<section class="main-page__section-about">
  <div class="section-about-main">
    <div class="container">
      <div class="row">
        <div class="section-about-main__img">
          <img src="<?php echo HOST . 'static/img/section-about-main/' . $settings['about_img'];?>" alt="Изображение" />
        </div>
        <div class="section-about-main__wrapper">
          <div class="section-about-main__content">
            <?php include ROOT . "templates/about/_parts/_about.tpl";?>
          </div>
          <?php include ROOT . "templates/about/_parts/_services.tpl";?>
        </div>
      </div>
    </div>
  </div>
</section>