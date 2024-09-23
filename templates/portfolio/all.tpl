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
            <img src="<?php echo HOST;?>usercontent/portfolio/<?php echo empty($project['cover_small']) ? 'no-photo-small.jpg' : $project['cover_small'];?>" 
                alt="<?php echo $project['title'];?>"/>
      
            <?php if (!empty($project['technology'])) : ?>
              <div class="badge badge--link badge-card badge-card--left">
                <?php foreach ($project['technology'] as $technology) : ?>
                  <a href="<?php echo HOST . "portfolio/cat/" . $technology['id'];?>" class=""><?php echo $technology['title'];?></a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($project['cat_id'])) : ?>
              <a href="<?php echo HOST . "portfolio/cat/" . $project['cat_id'];?>" class="badge badge--light badge--link badge-card badge-card--right"><?php echo $project['cat'];?></a>
            <?php endif; ?>
             
            
          </div>
          <h4 class="card-project__title">
            <a class="card-project__link" href="<?php echo HOST . 'portfolio/'. $project['id'];?>">
                <?php echo $project['title'];?>
            </a>
          </h4>
        </div>
      <?php endforeach; ?>
      
    </div>
    <div class="page-portfolio__pagination">
      <?php include ROOT . "templates/_parts/pagination/_pagination.tpl"; ?>
    </div>
  </div>
</main>