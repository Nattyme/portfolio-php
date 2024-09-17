<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Бренды</h2>
      <a class="secondary-button" href="<?php HOST;?>brand-new">Создать новый бренд</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Название</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($brands as $brand) : ?>
          <tr>
            <td><?php echo $brand['id'];?></td>
            <td>
              <a class="link-to-page" href="<?php echo HOST; ?>admin/brand-edit?id=<?php echo $brand['id'];?>">
                <?php echo $brand['title'];?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST . "admin/";?>brand-delete?id=<?php echo $brand['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
