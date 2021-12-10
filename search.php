
<?php get_header(); ?>
  <!-- 主内容区域 -->
  <div class="main-wrapper">
    <div class="main">
      <div class="content">
        <!-- 提示 -->
        <div class="tips-wrapper">
          <?php get_template_part('template/component/card-tips') ?>
        </div>

        <!-- 文章列表 -->
        <div class="post-list-no-title">
          <div class="post-list-wrapper">
            <?php get_template_part('template/post-list'); ?>
          </div>
        </div>
        <!-- 分页 -->
        <?php 
          $paginationHtml = getPaginationHtml();
          if(!empty($paginationHtml)):
        ?>
        <div class="pagination-wrapper">
          <?php echo $paginationHtml ?>
        </div>
        <?php endif; ?>

      </div>
      <!-- 侧边栏 -->
      <div class="sidebar">
        <?php get_sidebar(); ?>
      </div>
      
    </div>
    
  </div>

    
  <?php get_footer(); ?>
 