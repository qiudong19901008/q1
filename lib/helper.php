<?php


/**
 * 获取评论数量
 */
function getPostCommentCount($post_id){
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
  $count = get_post_meta( $post_id, 'q1_post_like_count', true );
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
 * @description 获取上一篇文章信息
 * @return Array 
 */
function getPrevPostInfo( $post_id ) {
  global $post;
  $oldGlobal = $post;
  $post = get_post( $post_id );
  $prevPost = get_previous_post();
  $post = $oldGlobal;
  if ( '' == $prevPost ) {
      return [];
  }
  return [
    'title'=>$prevPost->post_title,
    'url'=>get_home_url().'/'.$prevPost->ID.'.html',
  ];
}

/**
 * @description 获取下一篇文章信息
 * @return Array
 */
function getNextPostInfo($post_id){
  global $post;
  $oldGlobal = $post;
  $post = get_post( $post_id );
  $nextPost = get_next_post();
  $post = $oldGlobal;
  if ( '' == $nextPost ) {
      return [];
  }
  return [
    'title'=>$nextPost->post_title,
    'url'=>get_home_url().'/'.$nextPost->ID.'.html',
  ];
}

/**
 * @description 获取分类信息
 * @param number $post_id
 * @param Boolean $is_first 是否只获取第一个
 * @return Array 
 */
function getCategorysInfo($post_id,$is_first=true){
  $categories = get_the_category($post_id);
  if(!$categories){
    return [];
  }
  $res = [];
  foreach($categories as $category){
    $oneCategoryInfo = [
      'id'=>$category->term_id,
      'name'=>$category->name,
      'slug'=>$category->slug,
      'url'=>get_category_link($category->term_id),
    ];
    array_push($res,$oneCategoryInfo);
    if($is_first){
      break;
    }
  }
  return $res;
}

/**
 * @description 获取标签信息
 * @param number $post_id
 * @param Boolean $is_first 是否只获取第一个
 * @return Array 
 */
function getTagsInfo($post_id,$is_first=true){
  $tags = get_the_tags($post_id);
  if(!$tags){
    return [];
  }
  $res = array();
  foreach($tags as $tag){
    $oneTagInfo = [
      'name'=>$tag->name,
      'id'=>$tag->term_id,
      'slug'=>$tag->slug,
      'url'=>get_tag_link($tag->term_id),
    ];
    array_push($res,$oneTagInfo);
    if($is_first){
      break;
    }
  }
  return $res;
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
      $count = getPostCommentCount(get_the_ID());
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

/**
 * cookie是否包含某个值
 */
function has_cookie($cookie_name){
  if(isset($_COOKIE[$cookie_name])){
    return true;
  }else{
    return false;
  }
}



