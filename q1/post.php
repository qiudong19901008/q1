
  <?php get_header(); ?>



<?php get_footer(); ?>
  
  

<?php 
  get_template_part('q1/header')  
?>
    
    <div class="postPageWrap">

      <div class="postPage">
        <!-- 分类页内容 -->
        <div class="postPage__contentWrap">
          <?php get_template_part('q1/component/postPageContent/postPageContent') ?>
        </div>
        <!-- 侧边栏 -->
        <div class="postPage__sidebar">
          <?php get_sidebar(); ?>
        </div>
      </div>

    </div>

    
<?php 
  get_template_part('q1/footer');
?>
 
  
  