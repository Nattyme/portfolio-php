<div class="card-product">
  <div class="badges">
  <?php if (!empty($product['cat'])) : ?>
    <a href="<?php echo HOST . "shop/cat/" . $product['cat'];?>" class="badge badge--light badge--link">
      <?php echo $product['cat_title'];?>
    </a>
  <?php endif; ?>
  <?php if (!empty($product['brand'])) : ?>
    <a href="<?php echo HOST . "shop/cat/" . $product['cat'];?>" class="badge badge--link">
      <?php echo $product['brand'];?>
    </a>
  <?php endif; ?>
  </div>

  <div class="card-product__img">
    <img src=<?php echo HOST . 'usercontent/products/' . $product['cover_small'];?> 
         alt="<?php echo $product['title'];?>" 
    />
  </div>
  <div class="card-product__title">
    <?php echo $product['title'];?>
  </div>
  <div class="card-product-row">
    <div class="card-product__price">
      <span><?php echo format_price($product['price']);?> руб.</span>
    </div>
    <a href="<?php echo HOST . 'shop/' . $product['id'];?>" class="card-product__button">
      <div class="watch-button">Смотреть</div>
    </a>
  </div>
</div>