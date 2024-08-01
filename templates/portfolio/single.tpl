<main class="page-project">
  <div class="container">
    <div class="page-project__title">
      <h1 class="heading"><?php echo $project['title'];?></h1>
      <div class="page-project__info">
        <div class="page-project__date"><?php echo rus_date("j F Y", $project['timestamp']); ?></div>
        <div class="badge">работы</div>
      </div>
    </div>
    <div class="page-project__preview"><img src="<?php echo HOST .'usercontent/portfolio/' . $project['cover'];?>" alt="Верстка и frontend для интернет магазина" /></div>
    <div class="page-project__content">
      <div class="row">
        <div class="col-md-6">
          <div class="page-project__content-item">
            <h4 class="heading">Кратко о проекте </h4>
            <p><?php echo $project['about'];?></p>
          </div>
          <div class="page-project__content-item">
            <div class="details">
              <div class="details__item">Время работы над проектом:<span><?php echo $project['deadline'];?></span></div>
              <div class="details__item">Страниц сверстано:<span><?php echo $project['pages'];?></span></div>
              <div class="details__item">Бюджет проекта:<span><?php echo $project['budget'];?></span></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="page-project__content-item">
            <h4 class="heading">Технологии </h4>
            <?php echo $project['tools'];?>
          </div>
          <div class="page-project__content-item">
            <h4 class="heading">Ссылка на проект </h4>
            <p class="special-link"><a href="<?php echo OUTLINK . $project['link'];?>"><?php echo $project['link'];?></a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="page-project__nav">
      <div class="post-pagination"> <a class="post-pagination__button" href="#">Назад </a><a class="post-pagination__button post-pagination__button--forward" href="#">Вперед</a></div>
    </div>
  </div>
</main>