<main class="page-blog">
  <div class="container">
    <div class="page-blog__header">
      <?php if(isset($catTitle)) : ?>
        <h2 class="heading"><?php echo $catTitle; ?></h2>
      <?php else: ?>
        <h2 class="heading">Блог</h2>
      <?php endif; ?>
    </div>
    <div class="page-blog__posts">

      <?php foreach($posts as $post) : ?>
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
      <?php endforeach; ?>

    </div>
    <div class="page-blog__pagination">
        <?php include ROOT . "templates/_parts/pagination/_pagination.tpl"; ?>
    </div>
  </div>
</main>