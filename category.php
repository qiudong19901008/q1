<?php get_header(); ?>

<div class="categoryWrap">

  <div class="category">
    <!-- 分类页内容 -->
    <div class="category__contentWrap">
      <?php get_template_part('frontend/categoryContent/categoryContent') ?>
    </div>
    <!-- 侧边栏 -->
    <div class="category__sidebar">
      <?php get_sidebar(); ?>
    </div>
  </div>

</div>


<?php get_footer(); ?>
