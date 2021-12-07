
<?php get_header(); ?>
  <!-- 主内容区域 -->
  <div class="main-wrapper">
    <div class="main">
      <div class="content">
        <!-- 提示 -->
        <div class="tips-wrapper">
          <?php get_template_part('component/card-tips') ?>
        </div>

        <!-- 文章列表 -->
        <div class="post-list">
          <div class="list">
            <div class="post-card">
              <?php get_template_part('component/post-card') ?>
            </div>
            <div class="post-card">
              <?php get_template_part('component/post-card') ?>
            </div>
            <div class="post-card">
              <?php get_template_part('component/post-card') ?>
            </div>
            <div class="post-card">
              <?php get_template_part('component/post-card') ?>
            </div>
            <div class="post-card">
              <?php get_template_part('component/post-card') ?>
            </div>
            <div class="post-card">
              <?php get_template_part('component/post-card') ?>
            </div>
            
          </div>
        </div>
        <!-- 分页 -->
        <div class="pagination">
          <?php get_template_part('component/pagination') ?>
        </div>

      </div>
      <!-- 侧边栏 -->
      <div class="sidebar">
        <?php get_sidebar(); ?>
      </div>
      

    </div>
    
  </div>

    
  <?php get_footer(); ?>
 