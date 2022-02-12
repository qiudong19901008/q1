<?php 

  get_header()  
  
?>
    
    <div class="searchPageWrap">
      <div class="searchPage">
        <!-- 分类页内容 -->
        <div class="searchPage__contentWrap">
          
          <div 
            class="searchPageContent"
            data-s="<?php the_search_query();?>"  
          >
            <!-- 页面提示 -->
            <div class="searchPageContent__pageTitleCardWrap">
              <?php get_template_part('template-parts/components/common/pageTitleCard/pageTitleCard') ?>
            </div>
            <!-- 文章列表 -->
            <div class="searchPageContent__postListWrap">
                <?php 
                  get_template_part('template-parts/components/common/postList/postList'); 
                ?>
            </div>
            
            <!-- 分页 -->
            <div class="searchPageContent__paginationWrap paginationWrap">
              <?php 
                get_template_part('template-parts/components/common/pagination/pagination'); 
              ?>
            </div>
            
            
          </div>
        </div>
        <!-- 侧边栏 -->
        <div class="searchPage__sidebar">
          <?php 
            get_sidebar();
          ?>
        </div>
      </div>
    </div>

<?php 
  get_footer();
?>
 