<?php if( isset($_SESSION['login']) && $_SESSION['login'] === 1) : ?>
  <?php $messages = R::find('messages', 'ORDER BY id DESC'); ;?>
  <div class="admin-panel">

    <div class="admin-panel__block-list">
      <?php if ($_SESSION['role'] === 'admin' ) : ?>
        <a class="admin-panel__link" href="<?php echo HOST; ?>admin">
          <img src="<?php echo HOST; ?>static/img/admin-panel/target.svg" alt="Перейти в админ панель">
          <div class="span">Панель управления</div>
        </a>
      <?php endif; ?>

      <a class="admin-panel__link" href="<?php echo HOST; ?>profile">
        <img src="<?php echo HOST; ?>static/img/admin-panel/user.svg" alt="Профиль">
        <div class="span">Профиль</div>
      </a>

      <?php if ($_SESSION['role'] === 'admin' ) : ?>
        <a class="admin-panel__link" href="<?php echo HOST; ?>admin/messages">
          <div class="admin-panel__message">
            <img src="<?php echo HOST; ?>static/img/admin-panel/mail.svg" alt=" Сообщение">
            
            <?php if ($messagesNewCounter > 0) : ?>
              <div class="admin-panel__message-icon">
                <?php echo $messagesNewCounter;?>
              </div>
            <?php endif;?>
          </div>
          <div class="span">Сообщение</div>
        </a>
        <a class="admin-panel__link" href="#">
          <div class="admin-panel__comments" data-number="15">
            <img src="<?php echo HOST; ?>static/img/admin-panel/message-square.svg" alt="Комментарии">
          </div>
          <div class="span">Комментарии</div>
        </a>
        <?php if ( $uriModule === 'blog' && isset($uriGet) && $uriGet !== 'cat') : ?>
          <a class="admin-panel__link" href="<?php echo HOST . 'admin/post-edit?id=' . $uriGet; ?>">
            <img src="<?php echo HOST; ?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
            <div class="span">Редактировать</div>
          </a>
        <?php elseif ( $uriModule === 'portfolio' && isset($uriGet) && $uriGet !== 'cat') : ?>
          <a class="admin-panel__link" href="<?php echo HOST . 'admin/project-edit?id=' . $uriGet; ?>">
            <img src="<?php echo HOST; ?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
            <div class="span">Редактировать</div>
          </a>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <div class="admin-panel__block-list">
      <a href="<?php echo HOST; ?>cart" class="admin-panel__link">
        Корзина 
        <?php echo !empty($cartCount) ? '(' . $cartCount . ')' : NULL; ?>
      <a href="<?php echo HOST; ?>logout" class="admin-panel__block-button">Выход</a>
    </div>

  </div> 
<?php else : ?>
  <div class="admin-panel">
    <div class="admin-panel__block-list">
    </div>
    <div class="admin-panel__block-list">
      <a href="<?php echo HOST; ?>cart" class="admin-panel__link">
        Корзина 
        <?php echo !empty($cartCount) ? '(' . $cartCount . ')' : NULL; ?>
      </a>
      <a href="<?php echo HOST; ?>login" class="admin-panel__block-button">Вход</a>
    </div>

  </div>
<?php endif; 