<?php
  use q1\core\constant\Actions;



?>



<div class="postListWithPagination">
    <div class="postListWithPagination__postList">
      <div class="postListWithPagination__postCardWrap">
        <?php 
          get_template_part('q1/component/common/postCard/postCard');
        ?>
      </div>
    </div>
    <div class="postListWithPagination__paginationWrap">
      <?php 
        get_template_part('template-parts/components/common/pagination/pagination'); 
      ?>
    </div>
</div>

