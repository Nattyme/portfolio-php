<div class="section-pagination">
  <div class="section-pagination__item"><a class="pagination-button" href="#">назад</a>
  </div>

  <?php for ($page = 1; $page <= $number_of_pages; $page++) : ?>
    <div class="section-pagination__item"> 
      <a class="pagination-button active" href="?page=<?php echo $page;?>"><?php echo $page;?></a>
    </div>
  <?php endfor;?>

  <div class="section-pagination__item"><a class="pagination-button" href="#">вперед</a>
  </div>
</div>