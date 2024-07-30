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
          <th>Файл</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php /* foreach ($cats as $cat) : ?>
          <tr>
            <td><?php echo $cat['id'];?></td>
            <td>
              <a href="<?php echo HOST; ?>admin/category-edit?id=<?php echo $cat['id'];?>">
                <?php echo $cat['title'];?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST . "admin/";?>category-delete?id=<?php echo $cat['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; */ ?> 
        <tr>
            <td>1</td>
            <td>
              <a href="<?php echo HOST;?>admin/message">
                Наташа
              </a>
            </td>
            <td>info@mail.ru</td>
            <td><a href="<?php echo HOST;?>admin/message">Короткий текст сообще...</a></td>
            <td>photo.jpg</td>
            <td>
              <a href="<?php echo HOST . "admin/";?>category-delete?id=<?php echo $cat['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
      </tbody>
    </table>
    <div class="admin-form__item pt-40">
      
    </div>
  </div>
</div>
