<main>
  <div class="container">
    <div class="order-registration">

      <div class="order-registration__title">
        <h1 class="heading">Результат оплаты заказа N<?php echo $paymentDB['order_id'];?></h1>
      </div>


<?php

      switch($payment['status']) {
        case 'pending':
          include ROOT . 'templates/payments/paymentstatus/_pending.tpl';
          break;
      
        case 'waiting_for_capture':
          include ROOT . 'templates/payments/paymentstatus/_waiting_for_capture.tpl';
          break;
      
        case 'succeeded':
          include ROOT . 'templates/payments/paymentstatus/_succeeded.tpl';
          break;
      
        case 'canceled':
          include ROOT . 'templates/payments/paymentstatus/_canceled.tpl';
          break;
      
        default:
          break;
      }
?>



      <div style="text-align: center;">
        <a href="<?php echo HOST;?>shop">Вернуться в магазин</a>
      </div>

    </div>  
  </div>
</main>