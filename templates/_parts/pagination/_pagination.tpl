<div class="section-pagination">
  <?php if ($page_number != 1) : ?>
    <div class="section-pagination__item">
      <a class="pagination-button" href="?page=<?php echo $page_number - 1; ?>">назад</a>
    </div>
  <?php endif;?>

  <!-- Если больше 6-ти страниц -->
  <?php if ($number_of_pages > 6) : ?>
    <?php if ($page_number - 2 > 0) : ?>
      <div class="section-pagination__item"> 
        <a class="pagination-button" href="?page=<?php echo ($page_number - 2);?>">
          <?php echo ($page_number - 2);?>
        </a>
      </div>
    <?php endif; ?>

    <?php if ($page_number - 1 > 0) : ?>
      <div class="section-pagination__item"> 
        <a class="pagination-button" href="?page=<?php echo ($page_number - 1);?>">
          <?php echo ($page_number - 1);?>
        </a>
      </div>
    <?php endif; ?>


    <div class="section-pagination__item"> 
      <a class="pagination-button active" href="?page=<?php echo $page_number;?>"><?php echo $page_number;?></a>
    </div>

    <?php if ($page_number + 2 <= $number_of_pages) : ?>
      <div class="section-pagination__item"> 
        <a class="pagination-button" href="?page=<?php echo ($page_number + 2);?>">
          <?php echo ($page_number + 2);?>
        </a>
      </div>
    <?php endif; ?>

    <?php if ($page_number + 1 <= $number_of_pages) : ?>
      <div class="section-pagination__item"> 
        <a class="pagination-button" href="?page=<?php echo ($page_number + 1);?>">
          <?php echo ($page_number + 1);?>
        </a>
      </div>
    <?php endif; ?>
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