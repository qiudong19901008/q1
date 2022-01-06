<?php 
  get_template_part('q1/header')  
?>
    
    <div class="tagPageWrap">

      <div class="tagPage">
        <!-- 分类页内容 -->
        <div class="tagPage__contentWrap">
          <?php get_template_part('q1/component/tagPageContent/tagPageContent') ?>
        </div>
        <!-- 侧边栏 -->
        <div class="tagPage__sidebar">
            <?php 
                get_template_part('q1/sidebar'); 
            ?>
        </div>
      </div>

    </div>

    
<?php 
  get_template_part('q1/footer');
?>
 