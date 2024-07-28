<section class="page-post__post-comments">
  <div class="page-post__title">
    <h2 class="heading">Оставить комментарий </h2>
  </div>
  <div class="page-post__comments-post-comment">
    <div class="post-comment">
      <div class="post-comment__avatar">
        <?php if ( !empty($_SESSION['logged_user']['avatar_small']) ):?>
          <div class="avatar-small">
            <img src="<?php echo HOST . 'usercontent/avatars/' . $_SESSION['logged_user']['avatar_small'];?>" alt="Аватарка" />
          </div>
        <?php else :?>
          <div class="avatar-small">
            <img src="<?php echo HOST ?>usercontent/avatars/no-avatar.svg" alt="Аватарка" />
          </div>
        <?php endif; ?>
      </div>
      <form class="post-comment__form" method="POST" action="">
        <div class="post-comment__form-textarea">
          <textarea class="textarea" placeholder="Введите ваш комментарий..."></textarea>
        </div>
        <div class="post-comment__form-button">
          <button name="submit" class="primary-button" type="submit">Комментировать</button>
        </div>
      </form>
    </div>
  </div>
</section>