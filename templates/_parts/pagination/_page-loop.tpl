<?php for ($page = 1; $page <= $pagination['number_of_pages']; $page++) : ?>
  <div class="section-pagination__item"> 
    <?php
      $active_class = ''; 
      if ($pagination['page_number'] == $page) {
        $active_class = 'active'; 
      } else if ($pagination['page_number'] === 1 && $page === 1) {
        $active_class = 'active'; 
      }
    ?>
    <a class="pagination-button <?php echo $active_class;?>" href="?page=<?php echo $page;?>"><?php echo $page;?></a>
  </div>
<?php endfor;