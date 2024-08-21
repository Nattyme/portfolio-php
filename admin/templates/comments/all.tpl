<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Комментарии</h2>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Отправитель</th>
          <th>Текст</th>
          <th>Время</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($comments as $comment) : ?>

          <tr <?php echo $comment['status'] === 'new' ? 'class="message-new"' : NULL;?>>
            <td>
              <?php echo $comment['id'];?>
            </td>
            <td>
              <a class="link-to-page" href="<?php echo HOST;?>admin/comment?id=<?php echo $comment['id'];?>">
                <?php echo !empty($comment['name']) ? $comment['name'] . ' ' . $comment['surname'] : "Аноним";?>
              </a>
            </td>
            <td>
               <?php echo $comment['text'];?>
            </td>
            <td>
              <?php echo rus_date("j. m. Y. H:i", $comment['timestamp']); ?>
            </td>
            <td>
              <a href="<?php echo HOST . "admin/";?>comments?action=delete&id=<?php echo $comment['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; ?> 
      </tbody>
    </table>
    <div class="admin-form__item pt-40">
      
    </div>
  </div>
</div>
