

<?php 
  get_header()
?>
    
    <div class="categoryPageWrap">

      <div class="categoryPage">
        <!-- 分类页内容 -->
        <div class="categoryPage__contentWrap">
          
          
          <div 
            class="categoryPageContent"
            data-slug="<?php 
              $term = get_queried_object();
              echo $term->slug;
            ?>"
          >
            <!-- 页面提示 -->
            <div class="categoryPageContent__pageTitleCardWrap">
              <?php get_template_part('template-parts/components/common/pageTitleCard/pageTitleCard') ?>
            </div>
            <!-- 文章列表 -->
            <div class="categoryPageContent__postListWrap">
              <?php get_template_part('template-parts/components/common/postList/postList'); ?>
            </div>
            <!-- 分页 -->
            <div class="categoryPageContent__paginationWrap paginationWrap">
              <?php get_template_part('template-parts/components/common/pagination/pagination'); ?>
            </div>
            
            
          </div>

        </div>
        <!-- 侧边栏 -->
        <div class="categoryPage__sidebar">
          <?php 
            get_sidebar();
          ?>
        </div>
      </div>

    </div>

    
<?php 
  get_footer();
?>
 