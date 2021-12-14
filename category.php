<?php get_header(); ?>

<div class="categoryPageWrap">

  <div class="categoryPage">
    <!-- 分类页内容 -->
    <div class="categoryPage__contentWrap">
      <?php get_template_part('frontend/categoryPageContent/categoryPageContent') ?>
    </div>
    <!-- 侧边栏 -->
    <div class="categoryPage__sidebar">
      <?php get_sidebar(); ?>
    </div>
  </div>

</div>


<?php get_footer(); ?>
