<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl"; ?>
    <?php include ROOT . "admin/templates/components/success.tpl"; ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Пользователи</h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Имя</th>
          <th>Эл. почта</th>
          <th>Зарегестрирован</th>
          <th>Комментарии</th>
          <th>Роль</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>
          <tr>
            <td><?php echo $user['id'];?></td>
            <td>
              <a href="<?php echo HOST; ?>profile-edit/<?php echo $user['id'];?>">
                <?php echo $user['name'];?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST; ?>profile-edit?id=<?php echo $user['id'];?>">
                <?php echo $user['email'];?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST; ?>admin/profile-edit?id=<?php echo $user['id'];?>">
                <?php echo rus_date("d. m. Y. H:i", $user['timestamp']);?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST; ?>admin/profile-edit?id=<?php echo $user['id'];?>">
                <?php echo 'комментарии';?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST; ?>admin/profile-edit?id=<?php echo $user['id'];?>">
                <?php echo $user['role'];?>
              </a>
            </td>
            <td>
              <a href="<?php echo HOST;?>admin/user-delete?id=<?php echo $user['id'];?>" class="icon-delete"></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
