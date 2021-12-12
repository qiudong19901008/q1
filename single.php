
  <?php get_header(); ?>
  <!-- 主内容区域 -->
  <div class="main-wrapper">
    <div class="main">
      <div class="content">
        <div class="post-content-wrapper">
          <?php get_template_part('template/component/post-content'); ?>
        </div>
        <div class="prev-next-wrapper">
          <?php get_template_part('template/component/prev-next'); ?>
        </div>
        <div class="recommend-wrapper">
         <?php get_template_part('template/component/recommend'); ?>
        </div>
        <!-- <div class="comment-wrapper">
        </div> -->
        <?php 
          comments_template();
        ?>
      </div>
      <!-- 侧边栏 -->
      <div class="sidebar">
        <?php get_sidebar(); ?>
      </div>
      
    </div>
    
  </div>

    
  <?php get_footer(); ?>
 