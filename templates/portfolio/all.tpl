<main class="page-portfolio">
  <div class="container">
    <div class="page-portfolio__header">
      <?php if(isset($catTitle)) : ?>
        <h2 class="heading"><?php echo $catTitle; ?></h2>
      <?php else: ?>
        <h2 class="heading">Портфолио </h2>
      <?php endif; ?>
    </div>
    <div class="page-portfolio__cards">
      <?php foreach ( $projects as $project) : ?>
        <div class="card-project">
          <div class="card-project__img-wrapper">
            <img src="<?php echo HOST . 'usercontent/portfolio/' . $project['cover_small'];?>" alt="Архитектурное бюро John Doe и партнеры. Сайт под ключ" />
            <div class="card-project__technology">HTML, CSS, wordpress</div>
          </div>
          <h4 class="card-project__title">
            <a class="card-project__link" href="<?php echo HOST . 'portfolio/'. $project['id'];?>">
                <?php echo $project['title'];?>
            </a>
          </h4>
          <div class="badges">
              <?php if (!empty($project['cat'])) : ?>
                <a href="<?php echo HOST . "shop/cat/" . $project['cat'];?>" class="badge badge--light badge--link"><?php echo $project['cat'];?></a>
              <?php endif; ?>
              <!-- <?php if (!empty($product['brand'])) : ?>
                <a href="<?php echo HOST . "shop/brand/" . $product['brand'];?>" class="badge badge--link"><?php echo $product['brand_title'];?></a>
              <?php endif; ?> -->
          </div>
        </div>
      <?php endforeach; ?>
      
    </div>
    <div class="page-portfolio__pagination">
      <?php include ROOT . "templates/_parts/pagination/_pagination.tpl"; ?>
    </div>
  </div>
</main>