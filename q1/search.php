<?php 
  get_template_part('q1/header')  
?>
    
    <div class="searchPageWrap">
      <div class="searchPage">
        <!-- 分类页内容 -->
        <div class="searchPage__contentWrap">
          <?php 
            get_template_part('q1/component/searchPageContent/searchPageContent') 
          ?>
        </div>
        <!-- 侧边栏 -->
        <div class="searchPage__sidebar">
          <?php 
            get_template_part('q1/sidebar'); 
          ?>
        </div>
      </div>
    </div>

<?php 
  get_template_part('q1/footer');
?>
 