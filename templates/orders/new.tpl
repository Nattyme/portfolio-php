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
                    echo $i !== count($products) ? $product['title'] . ', ' : $product['title'] . '.';
                    $i = $i + 1;
                  }
                ?>
                </td>
                <td><?php echo $cartCount;?> шт.</td>
                <td><?php echo $cartTotalPrice; ?> руб.</td>
              </tr>
          

					</tbody>
				</table>

				<div class="order-registration__title">
					<h1 class="section-title">Оформить заказ</h1>
				</div>

				<form class="order-form" name="order-registration" action="./order-placed.html">
					<div class="order-form__row">
						<label>
							<p class="order-form__name">Имя</p>
							<input class="input-text" type="text" placeholder="Введите имя" id="form-title" name="name" />
						</label>

						<label>
							<p class="order-form__name">Фамилия</p>
							<input class="input-text" type="text" placeholder="Введите фамилию" id="form-title" name="name" />
						</label>
					</div>

					<div class="order-form__row">
						<label>
							<p class="order-form__name">Email</p>
								<input class="input-text" type="email" placeholder="Введите email" id="form-title" name="email" />
						</label>

						<label>
							<p class="order-form__name">Телефон</p>
								<input class="input-text" type="text" placeholder="Введите фамилию" id="form-title" name="name" />
						</label>
					</div>

					<div class="order-form__row">
						<label>
							<p class="order-form__name">Адрес доставки</p>
							<textarea class="textarea" name="buyer-adress" placeholder="Введите адрес доставки" title="Адрес доставки"></textarea>
						</label>
					</div>

					<div class="order-form__row order-form__row--justify-between">
						<a href="<?php HOST;?>ordercreated" class="primary-button">Оформить заказ </a>
						<a class="secondary-button" href="<?php HOST;?>cart">Вернуться в корзину </a>
					</div>

				</form>

			</div>
		</div>
	</main>