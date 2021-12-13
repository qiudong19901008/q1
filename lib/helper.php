<?php




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
 * 获取值, 没有则使用默认值
 */
 function getValue($value,$default){
  return !empty($value)?$value:$default;
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

/**
 * 设置cookie
 */
function setQ1Cookie($key,$value,$path='/',$expire=60*60*24*30){
  $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
  return setcookie($key,$value,$expire,$path,$domain,false);
}

/**
 * 返回json数据
 * @param array $data
 */
function json($data){
  header('Content-Type:application/json');
  echo json_encode($data);
  die;
}

