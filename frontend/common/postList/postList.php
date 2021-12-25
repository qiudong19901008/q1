

<div 
  class="postList"
  data-action="<?php echo Actions::Q1_API_POST_GET_POST_LIST; ?>"
  data-url="<?php echo admin_url('admin-ajax.php'); ?>"
  data-size="<?php echo get_option('posts_per_page',10); ?>"
  data-pageurl="<?php echo home_url(add_query_arg(array(),$wp->request)); ?>"
>
  <div class="postList__CardWrap">
    <?php 
      // get_template_part('frontend/common/postCard/postCard') 
    ?>
  </div>
</div>