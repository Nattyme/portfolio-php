<div class="section-pagination">
  <?php if ($page_number != 1) : ?>
    <div class="section-pagination__item">
      <a class="pagination-button" href="?page=<?php echo $page_number - 1; ?>">назад</a>
    </div>
  <?php endif;?>

  <!-- Если больше 6-ти страниц -->
  <?php if ($number_of_pages > 6) : ?>
    <div class="section-pagination__item"> 
      <a class="pagination-button <?php echo $page;?>" href="?page=<?php echo $page;?>"><?php echo $page;?></a>
    </div>
  <?php else : ?>
    <!-- Если 6 или меньше  -->
    <?php include ROOT . "templates/_parts/pagination/_page-loop.tpl";?>
  <?php endif; ?>

  <?php if ($page_number != $number_of_pages) : ?>
    <div class="section-pagination__item">
      <a class="pagination-button" href="?page=<?php echo $page_number + 1; ?>">вперед</a>
    </div>
  <?php endif;?>
</div>