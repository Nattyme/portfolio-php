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
							<td>Apple MacBook Air 13, Apple watch, Mac Pro</td>
							<td>3 единицы</td>
							<td>329 000 руб.</td>
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
						<button class="primary-button">Оформить заказ </button>
						<a class="secondary-button" href="./basket.html">Вернуться в корзину </a>
					</div>

				</form>

			</div>
		</div>
	</main>