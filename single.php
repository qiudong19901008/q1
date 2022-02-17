
<?php 

    get_header();

    use function hedao\lib\helper\console;
    use function q1\lib\helper\isOpenComment;

    $open = isOpenComment();
            


?>
    
    <div class="single">
      <div class="single__container container">
        
        <div class="single__main">
          <!-- 内容 -->
          <div class="postPageContent__contentWrap">
            <?php get_template_part('components/postContent/postContent'); ?>
          </div>

          <!-- 上一篇下一篇 -->
          <div class="postPageContent__nextPrevWrap">
            <?php get_template_part('components/prevNextCard/prevNextCard'); ?>
          </div>

          <!-- 推荐 -->
          <div class="postPageContent__recommendWrap">
            <?php 
              get_template_part('components/recommendCard/recommendCard'); 
            ?>
          </div>

          <?php

            // $c = get_comments();
          // console($c);
            // get_template_part('components/commentSection/commentSection'); 
            $open = isOpenComment();
            if($open){
              get_template_part('components/commentSection/commentSection'); 
            }
          ?>

        </div>

        <!-- 侧边栏 -->
        <aside class="single__sidebar">
          <?php 
            get_sidebar();
          ?>
        </aside>

      </div>

    </div>


      

    
<?php 
  get_footer();
?>
 