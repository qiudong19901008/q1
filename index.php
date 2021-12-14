
    <?php get_header(); ?>

    <div class="indexWrap">

      <div class="index">
        <!-- 首页内容 -->
        <div class="index__contentWrap">
          <?php get_template_part('frontend/indexContent/indexContent') ?>
        </div>
        <!-- 侧边栏 -->
        <div class="index__sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>

    </div>

    
  <?php get_footer(); ?>
 