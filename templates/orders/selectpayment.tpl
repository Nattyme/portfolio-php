<main>
  <div class="container">
    <div class="order-registration">

      <div class="order-registration__title">
        <h1 class="heading">Оплата заказа N <?php echo $order['id'];?></h1>
      </div>

      <table class="order-table">
        <tr>
            <th>Дата создания</th>
            <td>
              <?php if ($order['timestamp']) echo rus_date('j F Y в G:i', $order['timestamp']);?>
            </td>
        </tr>
        <tr>
          <th>Общая стоимость</th>
          <td>
            <?php echo format_price($order['price']);?> руб.
          </td>
        </tr> 
      </table>

      <div class="order-registration__title">
        <h2 class="section-title">Способ оплаты</h2>
      </div>

      <div class="payment-methods">
        <a href="<?php echo HOST;?>paymentyookassa" class="payment-yookassa">
          <img src="<?php echo HOST . 'static/img/icons/yookassa.svg' ;?>" alt="success">
          <span>Оплатить через Юкасса</span>
        </a>
      </div>
    </div>  
  </div>
</main>