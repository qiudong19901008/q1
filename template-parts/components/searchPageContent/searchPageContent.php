
<div 
  class="searchPageContent"
  data-s="<?php the_search_query();?>"  
>
  <!-- 页面提示 -->
  <div class="searchPageContent__pageTitleCardWrap">
    <?php get_template_part('q1/component/common/pageTitleCard/pageTitleCard') ?>
  </div>
  <!-- 文章列表 -->
  <div class="searchPageContent__postListWrap">
      <?php 
        get_template_part('q1/component/common/postList/postList'); 
      ?>
  </div>
  
  <!-- 分页 -->
  <div class="searchPageContent__paginationWrap paginationWrap">
    <?php 
      get_template_part('q1/component/common/pagination/pagination'); 
    ?>
  </div>
  
  
</div>