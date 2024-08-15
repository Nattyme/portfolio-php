<main>
		<div class="container">
			<section class="page-shopping-cart">
				<h1 class="page-shopping-cart__main-title">Корзина</h1>
				<div class="page-shopping-cart__row-gray">
					<h2 class="page-shopping-cart__title">наименование</h2>
					<h2 class="page-shopping-cart__title">количество</h2>
					<h2 class="page-shopping-cart__title">стоимость</h2>
				</div>
        <?php foreach( $products as $product) : ?>
          <div class="page-shopping-cart__row">
            <div class="page-shopping-cart__img"><img src="<?php echo HOST .'usercontent/products/' . $product['cover_small'];?>" alt="productName" /></div>
            <div class="page-shopping-cart__name"><a href="air-13.html"><?php echo $product['title'];?></a></div>
            <div class="page-shopping-cart__id"><?php echo $_SESSION['cart'][$product['id']];?></div>
            <div class="page-shopping-cart__money"><?php echo $product['price'];?> руб.</div>
            <div class="page-shopping-cart__delete">
              <div> <span class="leftright"></span><span class="rightleft"> </span></div>
            </div>
          </div>
        <?php endforeach; ?>
				<div class="page-shopping-cart__row-down">
					<div class="page-shopping-cart__id"><?php echo array_sum($_SESSION['cart']);?> единицы</div>
					<div class="page-shopping-cart__money"><?php echo ;?> руб.</div>
				</div>
        <a class="page-shopping-cart__button" href="order-registration.html">Перейти к оформлению заказа</a>
			</section>
		</div>
	</main>