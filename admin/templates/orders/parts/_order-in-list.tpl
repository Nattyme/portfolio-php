<tr <?php echo $order['status'] === 'new' ? 'class="message-new"' : NULL;?>>
  <td>
    <?php echo $order['id'];?>
  </td>
  <td>
    <?php if ($order['timestamp']) { echo rus_date('j F Y G:i', $order['timestamp']); } ?>
  </td>
  <td>
    <a href="<?php echo HOST . 'admin/order?id=' . $order['id'];?>">
      <?php echo $order['name'] . '&nbsp;' . $order['surname'];  ?>
    </a>
  </td>
  <td>
    <a href="<?php echo HOST . 'admin/order?id=' . $order['id'];?>">
      <?php echo $order['email']; ?>
    </a>
  </td>
  <td>
    <a href="<?php echo HOST . 'admin/order?id=' . $order['id'];?>">
      <?php echo $order['status']; ?>
    </a>
  </td>
  <td>
    <?php 
      if ( $order['paid']) {
        echo 'Оплачен';
      } else {
        echo 'Не оплачен';
      }
    ?>
  </td>
  <td>
    <a href="<?php echo HOST . 'admin/order?id=' . $order['id'];?>">
      <?php echo $order['price'] ? number_format($order['price'], 2, ',', ' ') . ' руб.' : 'Нет данных'?>
    </a>
  </td>
  <td>
    <a href="<?php echo HOST . "admin/";?>orders?action=delete&id=<?php echo $message['id'];?>" class="icon-delete"></a>
  </td>
</tr>