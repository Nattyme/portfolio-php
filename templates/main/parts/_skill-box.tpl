<?php if (!empty($settings['design_on']) || !empty($settings['html_on']) || !empty($settings['css_on']) ||
          !empty($settings ['js_on']) || !empty($settings['php_on']) || !empty($settings['wp_on'])
      ) : ?>
  <div class="page-about__section-skills mt-60">
    <div class="section-skills">
      <div class="container">
        <div class="section-skills__title">
          <h2 class="heading">Навыки </h2>
        </div>
        <div class="section-skills__wrapper">
        <?php if ( !empty($settings['design_on'])) : ?>
          <div class="block-item-skills">
            <img class="block-item-skills__img" src="<?php echo HOST . 'static/img/block-item-scills/ui.svg';?>" alt="Изображение навыка" />
            <h4 class="block-item-skills__title"> UI/UX design</h4>
          </div>
        <?php endif; ?>

        <?php if ( !empty($settings['html_on'])) : ?>
          <div class="block-item-skills"> 
            <img class="block-item-skills__img" src="<?php echo HOST . 'static/img/block-item-scills/html5.svg';?>" alt="Изображение навыка" />
            <h4 class="block-item-skills__title"> HTML5</h4>
          </div>
        <?php endif; ?>

        <?php if ( !empty($settings['css_on'])) : ?>
          <div class="block-item-skills"> 
            <img class="block-item-skills__img" src="<?php echo HOST . 'static/img/block-item-scills/css3.svg';?>" alt="Изображение навыка" />
            <h4 class="block-item-skills__title"> CSS3</h4>
          </div>
        <?php endif; ?>

        <?php if ( !empty($settings['js_on'])) : ?>
          <div class="block-item-skills"> <img class="block-item-skills__img" src="<?php echo HOST . 'static/img/block-item-scills/js.svg';?>" alt="Изображение навыка" />
            <h4 class="block-item-skills__title"> JS</h4>
          </div>
        <?php endif; ?>

        <?php if ( !empty($settings['php_on'])) : ?>
          <div class="block-item-skills"> 
            <img class="block-item-skills__img" src="<?php echo HOST . 'static/img/block-item-scills/php.svg';?>" alt="Изображение навыка" />
            <h4 class="block-item-skills__title"> PHP</h4>
          </div>
        <?php endif; ?>

        <?php if ( !empty($settings['wp_on'])) : ?>
          <div class="block-item-skills"> 
            <img class="block-item-skills__img" src="<?php echo HOST . 'static/img/block-item-scills/wp.svg';?>" alt="Изображение навыка" />
            <h4 class="block-item-skills__title"> WordPress</h4>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>