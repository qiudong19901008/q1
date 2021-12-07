
    <?php get_header(); ?>
  <!-- 主内容区域 -->
  <div class="main-wrapper">
    <div class="main">
      <div class="content">
        <!-- 置顶文章 -->
        <div class="top-post">
          <div class="title">
            置顶
          </div>
          <div class="post-wrapper">
            <?php get_template_part('component/post-card') ?>
          </div>
        </div>
        <!-- 文章列表 -->
        <div class="post-list">
          <div class="title">
            最新文章
          </div>
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
 