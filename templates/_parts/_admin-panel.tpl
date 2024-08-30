<?php if( isset($_SESSION['login']) && $_SESSION['login'] === 1) : ?>
  <?php $messages = R::find('messages', 'ORDER BY id DESC'); ;?>
  <div class="admin-panel">

    <div class="admin-panel__block-list">
      <?php if ($_SESSION['role'] === 'admin' ) : ?>
        <a class="admin-panel__link" href="<?php echo HOST; ?>admin" title="Перейти в панель управления сайтом">
          <img src="<?php echo HOST; ?>static/img/admin-panel/target.svg" alt="Перейти в админ панель">
          <div class="span">Панель управления</div>
        </a>
      <?php endif; ?>

      <a class="admin-panel__link" href="<?php echo HOST; ?>profile" title="Перейти на страницу своего профиля">
        <img src="<?php echo HOST; ?>static/img/admin-panel/user.svg" alt="Профиль">
        <div class="span">Профиль</div>
      </a>

      <?php if ($_SESSION['role'] === 'admin' ) : ?>
        <!-- Сообщения -->
        <a class="admin-panel__link" href="<?php echo HOST; ?>admin/messages" title="Перейти списку сообщений">
          <div class="admin-panel__message">
            <img src="<?php echo HOST; ?>static/img/admin-panel/mail.svg" alt=" Сообщение">
            
            <?php if ($messagesNewCounter > 0 && $messagesNewCounter <= $messagesDisplayLimit) : ?>
              <div class="admin-panel__message-icon">
                <?php echo $messagesNewCounter;?>
              </div>
            <?php else : ?>
              <div class="admin-panel__message-icon">
                <?php echo '&hellip;';?>
              </div>
            <?php endif;?>
          </div>
          <div class="span">Сообщение</div>
        </a>
        <!--// Сообщения -->

        <!-- Заказы -->
        <a class="admin-panel__link" href="<?php echo HOST; ?>admin/orders" title="Перейти к списку заказов">
          <div class="admin-panel__message">
            <img src="<?php echo HOST; ?>static/img/admin-panel/folder.svg" alt="Заказы">
            
            <?php if ($ordersNewCounter > 0 && $ordersNewCounter <= $ordersDisplayLimit) : ?>
              <div class="admin-panel__message-icon">
                <?php echo $ordersNewCounter;?>
              </div>
            <?php else : ?>
              <div class="admin-panel__message-icon">
                <?php echo '&hellip;';?>
              </div>
            <?php endif;?>
          </div>
          <div class="span">Заказы</div>
        </a>
        <!--// Заказы -->

        <!-- Комментарии -->
        <a class="admin-panel__link" href="<?php echo HOST . 'admin/comments';?>" title="Перейти к списку комментариев">
          <div class="admin-panel__comments" data-number="15">
            <img src="<?php echo HOST; ?>static/img/admin-panel/message-square.svg" alt="Комментарии">
              <?php if ($commentsNewCounter > 0 && $commentsNewCounter <= $commentsDisplayLimit) : ?>
                <div class="admin-panel__message-icon">
                  <?php echo $commentsNewCounter;?>
                </div>
              <?php else : ?>
                <div class="admin-panel__message-icon">
                  <?php echo '&hellip;';?>
                </div>
              <?php endif;?>
          </div>
          <div class="span">Комментарии</div>
        </a>
        <!--// Комментарии -->

        <!-- Редактирование текущей страницы -->
        <?php if ( $uriModule === 'blog' && isset($uriGet) && $uriGet !== 'cat') : ?>
          <a class="admin-panel__link" href="<?php echo HOST . 'admin/post-edit?id=' . $uriGet; ?>" title='Перейти к редактированию текущей страницы'>
            <img src="<?php echo HOST; ?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
            <div class="span">Редактировать</div>
          </a>
        <?php elseif ( $uriModule === 'portfolio' && isset($uriGet) && $uriGet !== 'cat') : ?>
          <a class="admin-panel__link" href="<?php echo HOST . 'admin/project-edit?id=' . $uriGet; ?>" title='Перейти к редактированию текущей страницы'>
            <img src="<?php echo HOST; ?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
            <div class="span">Редактировать</div>
          </a>
        <?php endif; ?>
        <!--// Редактирование текущей страницы -->
      <?php endif; ?>
    </div>

    <div class="admin-panel__block-list">
      <a href="<?php echo HOST; ?>cart" class="admin-panel__link" title="Перейти в корзину">
        Корзина 
        <?php echo !empty($cartCount) ? '(' . $cartCount . ')' : NULL; ?>
      <a href="<?php echo HOST; ?>logout" class="admin-panel__block-button" title="Выйти из текущего профиля">Выход</a>
    </div>

  </div> 
<?php else : ?>
  <div class="admin-panel">
    <div class="admin-panel__block-list">
    </div>
    <div class="admin-panel__block-list">
      <a href="<?php echo HOST;?>favorite" class="admin-panel__link" title="Избранные товары">
          Избранное
          <?php echo !empty($fav_listCount) ? '(' . $fav_listCount . ')' : NULL; ?>
      </a>
      <a href="<?php echo HOST; ?>cart" class="admin-panel__link" title="Перейти в корзину">
        Корзина 
        <?php echo !empty($cartCount) ? '(' . $cartCount . ')' : NULL; ?>
      </a>
     
      <a href="<?php echo HOST; ?>login" class="admin-panel__block-button" title="Выйти из текущего профиля">Вход</a>
    </div>

  </div>
<?php endif; 