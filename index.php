
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
          <div class="post-card-wrapper">
            <?php get_template_part('template/component/post-card') ?>
          </div>
        </div>
        <!-- 文章列表 -->
        <div class="post-list-has-title">
          <div class="title">
            最新文章
          </div>
          <div class="post-list-wrapper">
            <?php get_template_part('template/post-list'); ?>
          </div>
          
        </div>
        <!-- 分页 -->
        <div class="pagination-wrapper">
          <?php echo paginate_links(
            [
              'prev_next' => true,
              'mid_size'  => 1,
              'prev_text' => '上一页',
              'next_text' => '下一页',
            ]
          ); ?>
        </div>
      </div>
      <!-- 侧边栏 -->
      <div class="sidebar">
        <?php get_sidebar(); ?>
      </div>
      

    </div>
    
  </div>

    
  <?php get_footer(); ?>
 