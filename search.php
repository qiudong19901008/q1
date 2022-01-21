<?php 

  get_header()  
  
?>
    
    <div class="searchPageWrap">
      <div class="searchPage">
        <!-- 分类页内容 -->
        <div class="searchPage__contentWrap">
          <?php 
            get_template_part('template-parts/components/search/searchPageContent/searchPageContent') 
          ?>
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
 