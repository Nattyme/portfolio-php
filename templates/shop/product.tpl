<main>
		<div class="container">
			<section class="page-product">
        <?php include ROOT . "templates/components/errors.tpl"; ?>
        <?php include ROOT . "templates/components/success.tpl"; ?>

        <div class="page-product__row">
          <div class="page-product__col">
            <div class="page-product__img">
              <img src="<?php echo HOST . 'usercontent/products/' . $product['cover'];?>" 
                    alt="<?php echo $product['title'];?>"
              />
            </div>
          </div>
          <div class="page-product__col">
            <div class="page-product__title">
              <h2 class="section-title"><?php echo $product['title'];?></h2>
              <div class="badges">
                <?php if (!empty($product['cat_title'])) : ?>
                  <a href="<?php echo HOST . "shop/cat/" . $product['cat'];?>" class="badge badge--light badge--link"><?php echo $product['cat_title'];?></a>
                <?php endif; ?>
                <?php if (!empty($product['brand'])) : ?>
                  <a href="<?php echo HOST . "shop/brand/" . $product['brand'];?>" class="badge badge--link"><?php echo $product['brand_title'];?></a>
                <?php endif; ?>
              </div>
              
            </div>
            <div class="page-product__price"><?php echo format_price($product['price']);?> руб.</div>
            <a class="page-product__button primary-button" href="<?php echo HOST;?>addtocart?id=<?php echo $product['id'];?>">В корзину</a>
            <div class="page-product-text">
              <?php echo $product['content'];?>
              <p>
                <a href="!#">Подробнее об особенностях и преимуществах MacBook Air.</a>
              </p>
            </div>
          </div>
        </div>
			</section>
			<section>
				<div class="page-product__section-title">
					<h2 class="section-title">Смотрите также</h2>
				</div>
				<div class="page-product__cards"><a class="card-product" href="#!">
						<div class="card-product__img"><img src="<?php echo HOST . 'static/img/product.jpg';?> " alt="" /></div>
						<div class="card-product__title">Apple Mac Pro</div>
						<div class="card-product-row">
							<div class="card-product__price"> <span>150 000 руб</span></div>
							<div class="card-product__button">
								<div class="watch-button">Смотреть</div>
							</div>
						</div>
					</a><a class="card-product" href="#!">
						<div class="card-product__img"><img src="<?php echo HOST . 'static/img/product.jpg';?> " alt="" /></div>
						<div class="card-product__title">Apple Mac Pro</div>
						<div class="card-product-row">
							<div class="card-product__price"> <span>190 000 руб.</span></div>
							<div class="card-product__button">
								<div class="watch-button">Смотреть</div>
							</div>
						</div>
					</a><a class="card-product" href="#!">
						<div class="card-product__img"><img src="<?php echo HOST . 'static/img/product.jpg';?>" alt="" /></div>
						<div class="card-product__title">Apple iMac 27 Вторая линия названия</div>
						<div class="card-product-row">
							<div class="card-product__price"> <span>95 000 руб.</span></div>
							<div class="card-product__button">
								<div class="watch-button">Смотреть</div>
							</div>
						</div>
					</a>
				</div>
			</section>
		</div>
	</main>
 