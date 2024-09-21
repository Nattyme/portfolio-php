<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Технологии</h2>
      <a class="secondary-button" href="<?php HOST;?>technology-new">Добавить новую технологию</a>
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
        <?php foreach ($technologies as $technology) : ?>
          <tr>
            <td><?php echo $technology['id'];?></td>
            <td>
              <a class="link-to-page" href="<?php echo HOST; ?>admin/technology-edit?id=<?php echo $technology['id'];?>">
                <?php echo $technology['title'];?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST;?>admin/technology-delete?id=<?php echo $technology['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
