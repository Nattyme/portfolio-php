<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Сообщения</h2>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Отправитель</th>
          <th>Email</th>
          <th>Текст</th>
          <th>Время</th>
          <th>Файл</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($messages as $message) : ?>
          <tr>
            <td>
              <?php echo $message['id'];?>
            </td>
            <td>
              <a href="<?php echo HOST;?>admin/message?id=<?php echo $message['id'];?>">
                <?php echo $message['name'];?>
              </a>
            </td>
            <td>
              <?php echo $message['email'];?>
            </td>
            <td>
              <a href="<?php echo HOST;?>admin/message?id=<?php echo $message['id'];?>">
                <?php echo $message['message'];?>
              </a>
            </td>
            <td>
              <?php echo rus_date("j. m. Y. H:i", $message['timestamp']); ?>
            </td>
            <td>
              <?php echo $message['fileNameOriginal']; ?>
            </td>
            <td>
              <a href="<?php echo HOST . "admin/";?>category-delete?id=<?php echo $cat['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; ?> 
      </tbody>
    </table>
    <div class="admin-form__item pt-40">
      
    </div>
  </div>
</div>
