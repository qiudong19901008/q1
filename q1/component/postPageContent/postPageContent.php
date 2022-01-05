
<div class="postPageContent">
   
    <div class="postPageContent__contentWrap">
      <?php get_template_part('q1/component/post/postContent/postContent'); ?>
    </div>

    <div class="postPageContent__nextPrevWrap">
      <?php get_template_part('q1/component/post/prevNextCard/prevNextCard'); ?>
    </div>

    <div class="postPageContent__recommendWrap">
      
      <?php 
        get_template_part('q1/component/post/recommendCard/recommendCard'); 
      ?>
    </div>

    <!-- 评论模板 -->
    <?php 
      comments_template();
    ?>
  
</div>