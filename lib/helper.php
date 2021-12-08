<?php


/**
 * 获取评论数量
 */
function getCommentCountByPostId($post_id){
  return wp_count_comments($post_id)->total_comments;
}

/**
 * 获取文章浏览量
 */
function getPostViewCount($post_id){
  $count = get_post_meta( $post_id, 'view', true );
  return !empty($count)?$count:0;
}


function getPostCategory($post_id){
  $categories = get_the_category($post_id);
  foreach ($categories as $category){
    ?>

      <a 
        href="<?php echo get_category_link($category->term_id); ?>" 
        class="category"
      >
        <?php echo $category->cat_name; ?>
        <i></i>
      </a>
    
    <?php
    break;
  }
}




/**
 * 获取文章分类
 */


