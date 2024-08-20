<main>
		<div class="container">
			<div class="order-registration">

				<div class="order-registration__title">
					<h2 class="section-title">Состав заказа</h2>
				</div>

				<table class="order-table">
					<thead>
						<tr>
							<th>ТОВАРЫ В ЗАКАЗЕ</th>
							<th>ТОВАРЫ В ЗАКАЗЕ</th>
							<th>стоимость</th>
						</tr>
					</thead>
					<tbody>
              <tr>
                <td>
                  <?php 
                    $i = 1;
                    foreach ($products as $product) {
                      $link = ' <a href=" ';
                      $link .= HOST;
                      $link .= 'shop/';
                      $link .= $product['id'];
                      $link .= ' "> ';
                      $link .= $product['title'];
                      $link .= '</a>';
                    
                      if ($i !== count($products)) {
                        echo $link .= ', ';
                      } else {
                        echo $link .= '.';
                      }
                      $i = $i + 1;
                      // echo $link = '<a href="'; . HOST . 'shop/' . $product['id'] . '">' . $product['title'] . '</a>' . ', ';
                    }
                  ?>
                </td>
                <td><?php echo $cartCount;?> шт.</td>
                <td><?php echo format_price($cartTotalPrice); ?> руб.</td>
              </tr>
          

					</tbody>
				</table>

				<div class="order-registration__title">
					<h1 class="section-title">Оформить заказ</h1>
				</div>

				<form class="order-form" name="order-registration" action="<?php HOST;?>neworder" method="POST">
					<div class="order-form__row">
						<label>
              <?php 
                    $value = NULL;
                    if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']['name'])) {
                      $value = $_SESSION['logged_user']['name'];
                    }
              ?>
							<p class="order-form__name">Имя</p>
							<input class="input-text" type="text" 
                     placeholder="Введите имя" id="form-title" 
                     name="name" value="<?php echo $value;?>"/>
						</label>

						<label>
              <?php 
                  $value = NULL;
                  if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']['surname'])) {
                    $value = $_SESSION['logged_user']['surname'];
                  }
              ?>
							<p class="order-form__name">Фамилия</p>
							<input class="input-text" type="text" 
                     placeholder="Введите фамилию" id="form-title" 
                     name="surname" value="<?php echo $value;?>"/>
						</label>
					</div>

					<div class="order-form__row">
						<label>
              <?php 
                  $value = NULL;
                  if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']['email'])) {
                    $value = $_SESSION['logged_user']['email'];
                  }
              ?>
							<p class="order-form__name">Email</p>
								<input class="input-text" type="email" 
                       placeholder="Введите email" id="form-title" 
                       name="email" value="<?php echo $value;?>"/>
						</label>

						<label>
              <?php 
                  $value = NULL;
                  if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']['phone'])) {
                    $value = $_SESSION['logged_user']['phone'];
                  }
              ?>
							<p class="order-form__name">Телефон</p>
								<input class="input-text" type="text" 
                       placeholder="Введите фамилию" id="form-title" 
                       name="phone" value="<?php echo $value;?>"/>
						</label>
					</div>

					<div class="order-form__row">
						<label>
              <?php 
                  $value = NULL;
                  if ( isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user']['address'])) {
                    $value = $_SESSION['logged_user']['address'];
                  }
              ?>
							<p class="order-form__name">Адрес доставки</p>
							<textarea class="textarea" name="address" placeholder="Введите адрес доставки" title="Адрес доставки">
                  <?php echo $value;?>
              </textarea>
						</label>
					</div>

					<div class="order-form__row order-form__row--justify-between">
						<button class="primary-button" type="submit" name="submit">Оформить заказ </button>
						<a class="secondary-button" href="<?php HOST;?>cart">Вернуться в корзину </a>
					</div>

				</form>

			</div>
		</div>
	</main>