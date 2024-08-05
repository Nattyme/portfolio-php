<a class="card-product" href="<?php echo HOST . 'shop/' . $product['id'];?>">
  <div class="card-product__img">
    <img src=<?php echo HOST . 'usercontent/products/' . $product['coverSmall'];?> 
          alt="<?php echo $product['title'];?>" 
    />
  </div>
  <div class="card-product__title"><?php echo $product['title'];?></div>
  <div class="card-product-row">
    <div class="card-product__price"> <span><?php echo $product['price'];?> руб.</span></div>
    <div class="card-product__button">
      <div class="watch-button">Смотреть</div>
    </div>
  </div>
</a>