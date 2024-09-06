<?php foreach ($category_shop as $category) : ?>
  <li class="sub-nav__item">
    <a href="<?php echo HOST . 'shop/cat/' . $category['id']; ?>" class="sub-nav__link">
      <?php echo $category['title'];?>
    </a>
    <div class="sub-nav__dropdown-menu">
  
      <ul class="sub-nav-inner"> 
        <?php foreach ($brandsArray[$category['id']] as $brand) : ?>
            <li class="sub-nav-inner__item">
              <a href="<?php echo HOST . 'shop/cat/' . $category['id'];?>" class="sub-nav-inner__link">
                <?php echo $brand;?>
              </a>
            </li>
          <?php endforeach; ?>
       
        </ul> 
   
    </div>
  </li>
<?php endforeach; ?>