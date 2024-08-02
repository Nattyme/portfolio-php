<section class="main-page__posts-cards">
  <div class="main-page__posts-cards-title">
    <h2 class="heading">Новые записи в <a href="<?php HOST;?>blog">блоге</a></h2>
  </div>
  <div class="row">
    <?php foreach ( $posts as $post) : ?>
      <div class="col-4">
        <div class="card-post">
          <div class="card-post__img">
            <a href="<?php echo HOST . "blog/{$post['id']}"?>">
              <img src="<?php echo HOST;?>usercontent/blog/<?php echo empty($post['coverSmall']) ? "290-no-photo.jpg" : $post['coverSmall'];?>" 
                   alt="<?php echo $post['title'];?>"/>
            </a>
          </div>
          <h4 class="card-post__title">
            <a href="<?php echo HOST . "blog/{$post['id']}"?>"><?php echo $post['title'];?></a>
          </h4>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>