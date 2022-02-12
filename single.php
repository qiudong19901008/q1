
<?php 
  get_header()  
?>
    
    <div class="postPageWrap">

      <div class="postPage">
        <!-- 分类页内容 -->
        <div class="postPage__contentWrap">
        <?php
            use function q1\core\helper\isOpenComment;

            $open = isOpenComment();
            
          ?>

          <div class="postPageContent" data-commentstatus="<?php echo $open?'1':'0'; ?>">
            
              <div class="postPageContent__contentWrap">
                <?php get_template_part('template-parts/components/post/postContent/postContent'); ?>
              </div>

              <div class="postPageContent__nextPrevWrap">
                <?php get_template_part('template-parts/components/post/prevNextCard/prevNextCard'); ?>
              </div>

              <div class="postPageContent__recommendWrap">
                
                <?php 
                  get_template_part('template-parts/components/post/recommendCard/recommendCard'); 
                ?>
              </div>

              <!-- 评论模板 -->
              <?php 
                  
                $open = isOpenComment();
                  if($open){
                    get_template_part('comments'); 
                  }
              ?>
            
          </div>
        </div>
        <!-- 侧边栏 -->
        <div class="postPage__sidebar">
          <?php 
            get_sidebar();
          ?>
        </div>
      </div>

    </div>

    
<?php 
  get_footer();
?>
 