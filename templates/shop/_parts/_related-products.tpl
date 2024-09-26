<section>
  <div class="page-product__section-title">
    <h2 class="section-title">Смотрите также</h2>
  </div>
  <div class="page-product__cards">
    <?php foreach ($relatedProducts as $relatedProduct) : ?>
      <a class="card-product" href="<?php echo HOST . 'shop/' . $relatedProduct['id'];?>">
        <div class="card-product__img">
          <img src="<?php echo HOST;?>usercontent/products/<?php echo empty($relatedProduct['cover_small']) ? "290-no-photo.jpg" : $relatedProduct['cover_small'];?>" 
          alt="<?php echo $relatedProduct['title'];?>"/>
        </div>
        <div class="card-product__title"><?php echo $relatedProduct['title'];?></div>
        <div class="card-product-row">
          <div class="card-product__price"> <span><?php echo $relatedProduct['price'];?> руб</span></div>
          <div class="card-product__button">
            <div class="watch-button">Смотреть</div>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>