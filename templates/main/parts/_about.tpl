<section class="main-page__section-about">
  <div class="section-about-main">
    <div class="container">
      <div class="row">
        <div class="section-about-main__img">
          <img src="<?php echo HOST . 'usercontent/main/' . $main['main_img'];?>" alt="Изображение" />
        </div>
        <div class="section-about-main__wrapper">
          <div class="section-about-main__content">
            <div class="post-about-me">
              <h4 class="post-about-me__title"><?php echo $main['about_title'];?></h4>
              <?php echo $main['about_text'];?>
            </div>
          </div>
          <div class="post-about-skills">
            <h4 class="post-about-skills__title"><?php echo $main['services_title'];?></h4>
            <?php echo $main['services_text'];?>
          </div> 
        </div>
        <?php include ROOT . 'templates/main/parts/_skill-box.tpl'; ?>
      </div>
    </div>
  </div>
</section>