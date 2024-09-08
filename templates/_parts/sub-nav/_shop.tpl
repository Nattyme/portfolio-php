<?php foreach ($catsArray as $catKey => $category) : ?>
  <li class="sub-nav__item">
    <a href="<?php echo HOST . 'shop/cat/' . $catKey; ?>" class="sub-nav__link">
      <?php echo $category['cat_title'];?>
    </a>
    <div class="sub-nav__dropdown-menu">
  
      <ul class="sub-nav-inner"> 
        <?php foreach ($brandsArray as $brandKey => $brand) : ?>
          <?php if ($brandKey === $catKey) : ?>
            <li class="sub-nav-inner__item">
              <?php foreach ($brand as $brandId => $brandTitle) : ?>
                <a href="<?php echo HOST . 'shop/cat/' . $catKey;?>" class="sub-nav-inner__link">
                  <?php echo ($brandTitle); ?>
                </a>
              <?php endforeach; ?>
            </li>
          <?php endif;?>
        <?php endforeach; ?>
       
        </ul> 
   
    </div>
  </li>
<?php endforeach; ?>