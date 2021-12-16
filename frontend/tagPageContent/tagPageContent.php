
<div 
  class="tagPageContent" 
  data-slug="<?php 
    $term = get_queried_object();
    echo $term->slug;
  ?>" 
>

  <!-- 页面提示 -->
  <div class="tagPageContent__pageTitleCardWrap">
    <?php get_template_part('frontend/common/pageTitleCard/pageTitleCard') ?>
  </div>
  <!-- 文章列表 -->
  <div class="tagPageContent__postList">
    <div class="tagPageContent__postListWrap">
      <?php get_template_part('frontend/common/postList/postList'); ?>
    </div>
  </div>
  <!-- 分页 -->
  <div class="tagPageContent__paginationWrap">
    <?php get_template_part('frontend/common/pagination/pagination'); ?>
  </div>
  
  
</div>