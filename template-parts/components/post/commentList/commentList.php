<?php

    use q1\core\constant\Actions;

?>

<div 
  class="commentList" 
  data-url="<?php 
    echo admin_url('admin-ajax.php');
  ?>"
  data-action="<?php 
    echo Actions::Q1_ACTION_COMMENT_GET_COMMENT_LIST; 
  ?>"
  data-size="<?php 
    echo get_option('comments_per_page',10); 
  ?>"
  data-postid="<?php the_ID(); ?>"
>

  <div class="commentList__item">
    <div class="commentList__cardWrap">
      <?php 
        // get_template_part('q1/component/post/commentCard/commentCard'); 
      ?>
    </div>
    <div class="commentList__cardChild">
      <div class="commentList__childCardWrap">
        <?php 
          // get_template_part('q1/component/post/commentCard/commentCard'); 
        ?>
      </div>
    </div>
  </div>



  
</div>
