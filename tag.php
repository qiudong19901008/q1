<?php get_header(); ?>

<div class="tagWrap">

  <div class="tag">
    <!-- 分类页内容 -->
    <div class="tag__contentWrap">
      <?php get_template_part('frontend/tagContent/tagContent') ?>
    </div>
    <!-- 侧边栏 -->
    <div class="tag__sidebar">
      <?php get_sidebar(); ?>
    </div>
  </div>

</div>


<?php get_footer(); ?>
