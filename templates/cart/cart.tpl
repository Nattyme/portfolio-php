<main>
		<div class="container">
			<section class="page-shopping-cart">
        <?php if ( !empty($products)) : ?>
          <h1 class="page-shopping-cart__main-title">Корзина</h1>
          
          <?php include ROOT . "templates/components/errors.tpl"; ?>
          <?php include ROOT . "templates/components/success.tpl"; ?>

          <div class="page-shopping-cart__row-gray">
            <h2 class="page-shopping-cart__title">наименование</h2>
            <h2 class="page-shopping-cart__title">количество</h2>
            <h2 class="page-shopping-cart__title">стоимость</h2>
          </div>
          <?php foreach( $products as $product) : ?>
            <div class="page-shopping-cart__row">
              <div class="page-shopping-cart__img">
                <a href="<?php echo HOST . "shop/" . $product['id'];?>">
                  <img src="<?php echo HOST .'usercontent/products/' . $product['cover_small'];?>" alt="productName" />
                </a>
              </div>
              <div class="page-shopping-cart__name"><a href="<?php echo HOST . "shop/" . $product['id'];?>"><?php echo $product['title'];?></a></div>
              <div class="page-shopping-cart__id"><?php echo $cart[$product['id']];?></div>
              <div class="page-shopping-cart__money"><?php echo $product['price'];?> руб.</div>
              <a href="<?php echo HOST . 'removefromcart?id=' . $product['id'];?>" class="page-shopping-cart__delete">
                <div> <span class="leftright"></span><span class="rightleft"> </span></div>
              </a>
            </div>
          <?php endforeach; ?>
          <div class="page-shopping-cart__row-down">
            <div class="page-shopping-cart__id"><?php echo num_decline(array_sum($cart), ['единица', 'единицы', 'единиц'], true);?></div>
            <div class="page-shopping-cart__money"><?php echo $cartPriceTotal;?> руб.</div>
          </div>
          <a class="page-shopping-cart__button" href="order-registration.html">Перейти к оформлению заказа</a>
        <?php else : ?>
          <h1 class="page-shopping-cart__main-title">Ваша корзина пуста</h1>
          <a href="<?php echo HOST;?>shop" class="page-shopping-cart__delete">Добавить товары</a>
        <?php endif;?>
			</section>
		</div>
	</main>