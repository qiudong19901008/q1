<?php 
  
?>

<div class="indexPageContent">
  <!-- 置顶文章 -->
  <div class="indexPageContent__topPost">
    <div class="indexPageContent__topPostTitle">
      置顶
    </div>
    <div class="indexPageContent__topPostWrap">
      <?php get_template_part('frontend/common/postCard/postCard') ?>
    </div>
  </div>
  <!-- 文章列表 -->
  <div class="indexPageContent__postList">
    <div class="indexPageContent__postListTitle">
      最新文章
    </div>
    <div class="indexPageContent__postListWrap">
      <?php 
        get_template_part('frontend/common/postList/postList'); 
      ?>
    </div>
    
  </div>
  <!-- 分页 -->
  <div class="indexPageContent__paginationWrap">
    <?php 
      get_template_part('frontend/common/pagination/pagination'); 
    ?>
  </div>
  
  
</div>