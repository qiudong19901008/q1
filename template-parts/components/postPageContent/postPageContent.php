<?php
  use function q1\helper\isOpenComment;

  $open = isOpenComment();
  
?>

<div class="postPageContent" data-commentstatus="<?php echo $open?'1':'0'; ?>">
   
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

       $open = isOpenComment();
        if($open){
          get_template_part('q1/comments'); 
        }
    ?>
  
</div>