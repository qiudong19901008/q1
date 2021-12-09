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

/**
 * 获取文章点赞数量
 */
function getPostLikeCount($post_id){
  $count = get_post_meta( $post_id, 'like', true );
  return !empty($count)?$count:0;
}

/**
 * 获取文章分类html
 */
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
 * 获取值, 没有则使用默认值
 */
 function getValue($value,$default){
  return !empty($value)?$value:$default;
 }

 /**
  * 获取like, comment, view的html片段
  */
function getRecommendArticleMetaHtmlByType($type){
  $text = '';
  $count = 0;
  switch($type){
    case 'view':
      $count = getPostViewCount(get_the_ID());
      $text = '浏览('.$count.')';
      break;
    case 'comment':
      $count = getCommentCountByPostId(get_the_ID());
      $text = '评论('.$count.')';
      break;
    case 'like':
    
      break;
  }
  return '<span>'.$text.' </span>';
}

/**
 * 根据slug获得tag的永久连接
 */
function getTagUrl($slug){
  $url = home_url().'/tag/'.$slug;
  return $url;
}


