<main class="page-portfolio">
  <div class="container">
    <div class="page-portfolio__header">
      <h2 class="heading">Портфолио </h2>
    </div>
    <div class="page-portfolio__cards">
      <?php foreach ( $projects as $project) : ?>
        <div class="card-project">
          <div class="card-project__img-wrapper">
            <a href="<?php echo HOST . 'portfolio/'. $project['id'];?>">
              <img src="<?php echo HOST . 'usercontent/portfolio/' . $project['coverSmall'];?>" alt="Архитектурное бюро John Doe и партнеры. Сайт под ключ" />
              <div class="card-project__technology">HTML, CSS, wordpress</div>
            </a>
          </div>
          <h4 class="card-project__title">
            <a href="<?php echo HOST . 'portfolio/'. $project['id'];?>">
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