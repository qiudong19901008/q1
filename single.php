
  <?php get_header(); ?>

<div class="postPageWrap">

  <div class="postPage">
    <!-- 分类页内容 -->
    <div class="postPage__contentWrap">
      <?php get_template_part('frontend/postPageContent/postPageContent') ?>
    </div>
    <!-- 侧边栏 -->
    <div class="postPage__sidebar">
      <?php get_sidebar(); ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
  
  
  
  