
    <?php get_header(); ?>

    <div class="indexPageWrap">

      <div class="indexPage">
        <!-- 首页内容 -->
        <div class="indexPage__contentWrap">
          <?php 
            get_template_part('frontend/indexPageContent/indexPageContent') 
          ?>
        </div>
        <!-- 侧边栏 -->
        <div class="indexPage__sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>

    </div>

    
  <?php get_footer(); ?>
 