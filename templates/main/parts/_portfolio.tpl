<section class="main-page__projects-cards">
  <div class="main-page__projects-cards-title">
    <h2 class="heading">Новые проекты в <a href="#">портфолио</a>
    </h2>
  </div>
  <div class="row">
    <?php foreach ($projects as $project) : ?>
      <div class="col-6">
        <div class="card-project">
          <div class="card-project__img-wrapper">
            <a href="<?php echo HOST . 'portfolio/'. $project['id'];?>">
              <img src="<?php echo HOST . 'usercontent/portfolio/' . $project['coverSmall'];?>" alt="Архитектурное бюро John Doe и партнеры. Сайт под ключ" />
              <div class="card-project__technology">HTML, CSS, wordpress</div>
            </a></div>
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