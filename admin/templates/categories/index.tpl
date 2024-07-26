<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Категории</h2>
      <a class="secondary-button" href="<?php HOST;?>category-new">Создать новую категорию</a>
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
        <tr>
          <td>1</td>
          <td><a href="<?php echo HOST; ?>admin/category-edit">Заметки программиста</a></td>
          <td>
            <a href="<?php echo HOST . "admin/";?>category-delete" class="icon-delete"></a>
          </td>
        </tr>
        <?php /* foreach ($posts as $post) : ?>
          <tr>
            <td><?php echo $post['id']; ?></td>
            <td>
              <a href="<?php echo HOST . "admin/"; ?>post-edit?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
            </td>
            <td>
              <a href="<?php echo HOST . "admin/";?>post-delete?id=<?php echo $post['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; */ ?>
      </tbody>
    </table>
    <div class="admin-form__item pt-40">
      
    </div>
  </div>
</div>
