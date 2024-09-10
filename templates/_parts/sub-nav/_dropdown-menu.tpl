<ul class="sub-nav-inner"> 
  <?php foreach ($brandsArray as $brandKey => $brand) : ?>
    <?php if ($brandKey === $catKey) : ?>
      <li class="sub-nav-inner__item">
        <?php foreach ($brand as $brandId => $brandTitle) : ?>
          <a href="<?php echo HOST . 'shop/subcat/';?>" class="sub-nav-inner__link">
            <?php echo ($brandTitle); ?>
          </a>
        <?php endforeach; ?>
      </li>
    <?php endif;?>
  <?php endforeach; ?>
 
</ul> 