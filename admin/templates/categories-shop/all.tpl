<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Категории товаров</h2>
      <a class="secondary-button" href="<?php HOST;?>category-shop-new">Создать новую категорию</a>
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
        <?php foreach ($cats as $cat) : ?>
          <tr>
            <td><?php echo $cat['id'];?></td>
            <td>
              <a href="<?php echo HOST; ?>admin/category-shop-edit?id=<?php echo $cat['id'];?>">
                <?php echo $cat['title'];?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST . "admin/";?>category-shop-delete?id=<?php echo $cat['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="admin-form__item pt-40">
      
    </div>
  </div>
</div>
