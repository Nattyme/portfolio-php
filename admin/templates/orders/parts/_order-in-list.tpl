<tr <?php echo $order['status'] === 'new' ? 'class="message-new"' : NULL;?>>
  <td>
    <?php echo $order['id'];?>
  </td>
  <td>
    <?php if ($order['timestamp']) { echo rus_date('j F Y G:i', $order['timestamp']); } ?>
  </td>
  <td>
    <a href="<?php echo HOST;?>profile/<?php echo $order['user_id'];?>">
      <?php echo $order['name'] . ' ' . $order['surname'];  ?>
    </a>
  </td>
  <td>
    <?php echo $order['email'];  ?>
  </td>
  <td>
    <?php echo $order['status'];  ?>
  </td>
  <td>
    <?php echo $order['paid'];  ?>
  </td>
  <td>
    <?php echo $order['price'];?>
  </td>
  <td>
    <a href="<?php echo HOST . "admin/";?>orders?action=delete&id=<?php echo $message['id'];?>" class="icon-delete"></a>
  </td>
</tr>