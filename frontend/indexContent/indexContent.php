<?php 
  
?>

<div class="indexContent">
  <!-- 置顶文章 -->
  <div class="indexContent__topPost">
    <div class="indexContent__topPostTitle">
      置顶
    </div>
    <div class="indexContent__topPostWrap">
      <?php get_template_part('frontend/postCard/postCard') ?>
    </div>
  </div>
  <!-- 文章列表 -->
  <div class="indexContent__postList">
    <div class="indexContent__postListTitle">
      最新文章
    </div>
    <div class="indexContent__postListWrap">
      <?php get_template_part('frontend/postList/postList'); ?>
    </div>
    
  </div>
  <!-- 分页 -->
  <div class="indexContent__paginationWrap">
    <?php get_template_part('frontend/pagination/pagination'); ?>
  </div>
  
  
</div>