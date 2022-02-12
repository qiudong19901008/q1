<?php 
  get_header()  
?>
    
    <div class="tagPageWrap">

      <div class="tagPage">
        <!-- 分类页内容 -->
        <div class="tagPage__contentWrap">
          
            <div 
              class="tagPageContent" 
              data-slug="<?php 
                $term = get_queried_object();
                echo $term->slug;
              ?>" 
            >

              <!-- 页面提示 -->
              <div class="tagPageContent__pageTitleCardWrap">
                <?php get_template_part('template-parts/components/common/pageTitleCard/pageTitleCard') ?>
              </div>
              <!-- 文章列表 -->
              <div class="tagPageContent__postListWrap">
                  <?php get_template_part('template-parts/components/common/postList/postList'); ?>
              </div>
              <!-- 分页 -->
              <div class="tagPageContent__paginationWrap paginationWrap">
                <?php get_template_part('template-parts/components/common/pagination/pagination'); ?>
              </div>
              
              
            </div>
        </div>
        <!-- 侧边栏 -->
        <div class="tagPage__sidebar">
            <?php 
               get_sidebar();
            ?>
        </div>
      </div>

    </div>

    
<?php 
  get_footer();
?>
 