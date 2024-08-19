<div class="admin-page_content-form">
  <div class="admin-form">
    
    <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
    <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

    <div class="admin-form__item">
      <h2 class="heading">Заказ N <?php echo $order['id'];?></h2>
    </div>

    <!-- table order info -->
    <div class="admin-form__item">

      <table class="order-table">

        <tr>
          <th>Дата создания</th>
          <td><?php if ($order['timestamp']) echo rus_date("j F Y в G:i", $order['timestamp']) ;?></td>
        </tr>

        <tr>
          <th>Статус</th>
          <td><?php echo $order['status'];?></td>
        </tr>

        <tr>
          <th>Оплата</th>
          <td>
            <?php 
              if ( $order['paid']) {
                echo 'Оплачен';
              } else {
                echo 'Не оплачен';
              }
            ?>
          </td>
        </tr>

        <tr>
          <th>Общая стоимость</th>
          <td><?php echo number_format($order['price'], 2, ',', ' ');?> руб.</td>
        </tr>

        <tr>
          <th>Имя Фамилия</th>
          <td><?php echo $order['name'] . '' . $order['surname'];?></td>
        </tr>

        <tr>
          <th>Email</th>
          <td><?php echo $order['email'];?></td>
        </tr>

      </table>

    </div>
    <!--// table order info-->

    <!-- table products  -->
    <div class="admin-form__item">
      <table class="order-table">
        <tr>
          <th>Фотография</th>
          <th>ID</th>
          <th>Наименование</th>
          <th>Стоимость за единицу</th>
          <th>Количество</th>
        </tr>
        <?php foreach($products as $product) : ?>
          <tr>
            <td>
              <img src="<?php echo HOST . 'usercontent/products/' . $productsDB[$product['id']]['cover_small'];?>" alt="<?php echo $product['id'] ;?>">
            </td>
            <td><?php echo $product['id'];?></td>
            <td><?php echo $product['title'];?></td>

            <td>
              <?php echo number_format($product['price'], 2, ',', ' ') ;?>
            </td>

            <td><?php echo $product['amount'];?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <!--//  table products rows -->

  </div>
</div>