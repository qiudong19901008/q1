
<div 
  class="categoryPageContent"
  data-slug="<?php 
    $term = get_queried_object();
    echo $term->slug;
  ?>"  
  
>
  <!-- 页面提示 -->
  <div class="categoryPageContent__pageTitleCardWrap">
    <?php get_template_part('frontend/common/pageTitleCard/pageTitleCard') ?>
  </div>
  <!-- 文章列表 -->
  <div class="categoryPageContent__postList">
    
    <div class="categoryPageContent__postListWrap">
      <?php get_template_part('frontend/common/postList/postList'); ?>
    </div>
    
  </div>
  <!-- 分页 -->
  <div class="categoryPageContent__paginationWrap paginationWrap">
    <?php get_template_part('frontend/common/pagination/pagination'); ?>
  </div>
  
  
</div>