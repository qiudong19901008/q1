<?php 
  get_header()  
?>
    
    <div class="tagPageWrap">

      <div class="tagPage">
        <!-- 分类页内容 -->
        <div class="tagPage__contentWrap">
          <?php get_template_part('template-parts/components/tag/tagPageContent/tagPageContent') ?>
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
 