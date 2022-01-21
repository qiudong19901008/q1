
<div 
  class="tagPageContent" 
  data-slug="<?php 
    $term = get_queried_object();
    echo $term->slug;
  ?>" 
>

  <!-- 页面提示 -->
  <div class="tagPageContent__pageTitleCardWrap">
    <?php get_template_part('template-parts/components/common/pageTitleCard/pageTitleCard') ?>
  </div>
  <!-- 文章列表 -->
  <div class="tagPageContent__postListWrap">
      <?php get_template_part('template-parts/components/common/postList/postList'); ?>
  </div>
  <!-- 分页 -->
  <div class="tagPageContent__paginationWrap paginationWrap">
    <?php get_template_part('template-parts/components/common/pagination/pagination'); ?>
  </div>
  
  
</div>