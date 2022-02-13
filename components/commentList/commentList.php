<?php

    use q1\core\constant\Actions;

use function hedao\lib\helper\getSiteUrl;

?>

<div 
  class="commentList" 
  data-url="<?php 
    echo getSiteUrl() . '/wp-json/q1/v1/comment/list'
  ?>"
  data-size="<?php 
    echo get_option('comments_per_page',10); 
  ?>"
  data-postid="<?php the_ID(); ?>"
>

  <div class="commentList__item">
    <div class="commentList__cardWrap">
      <?php 
        // get_template_part('components/commentCard/commentCard'); 
      ?>
    </div>
    <div class="commentList__cardChild">
      <div class="commentList__childCardWrap">
        <?php 
          // get_template_part('components/commentCard/commentCard'); 
        ?>
      </div>
    </div>
  </div>



  
</div>
