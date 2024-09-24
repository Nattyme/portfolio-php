<section class="main-page__projects-cards">
  <div class="main-page__projects-cards-title">
    <h2 class="heading">Новые проекты в <a href="<?php HOST;?>portfolio">портфолио</a>
    </h2>
  </div>
  <div class="row">
    <?php foreach ($projects as $project) : ?>
      <div class="col-6">
        <div class="card-project">
          <div class="card-project__img-wrapper">
            <img src="<?php echo HOST;?>usercontent/portfolio/<?php echo empty($project['cover_small']) ? 'no-photo-small.jpg' : $project['cover_small'];?>" 
                alt="<?php echo $project['title'];?>"/>
        </div>
          <h4 class="card-project__title">
            <a href="<?php echo HOST . 'portfolio/'. $project['id'];?>">
              <?php echo $project['title'];?>
            </a>
          </h4>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>