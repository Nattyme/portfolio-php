<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Портфолио - все записи</h2>
      <a class="secondary-button" href="<?php HOST;?>project-new">Добавить проект</a>
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
        <?php foreach ($projects as $project) : ?>
          <tr>
            <td><?php echo $project['id']; ?></td>
            <td>
              <a class="link-to-page" href="<?php echo HOST . "admin/"; ?>project-edit?id=<?php echo $project['id']; ?>"><?php echo $project['title']; ?></a>
            </td>
            <td>
              <a href="<?php echo HOST . "admin/";?>project-delete?id=<?php echo $project['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="admin-form__item pt-40">
      <div class="section-pagination">
  
        <?php include ROOT . "admin/templates/_parts/pagination/_pagination.tpl"; ?>
    
      </div>
    </div>
  </div>
</div>
