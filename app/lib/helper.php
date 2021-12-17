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
 * @param number $postId 文章id, 如果不传入则使用当前的文章id
 * @return Array 
 */
function getPrevPostInfo( $postId=0 ) {
  global $post;
  $originGlobalPost = $post;
  //使用传入id的文章
  if($postId !== 0){
    $post = get_post( $postId );
  }
  $prevPost = get_previous_post();
  var_dump($prevPost);
  if ( '' == $prevPost ) {
      return [];
  }
  //把前一篇文章赋值给当前文章
  $post=$prevPost;
  $res = [
    'title'=>get_the_title(),
    'url'=>get_the_permalink(),
  ];
  //把最初的文章赋值给当前文章
  $post=$originGlobalPost;
  return $res;
}

/**
 * @description 获取下一篇文章信息
 * @param number $postId 文章id, 如果不传入则使用当前的文章id
 * @return Array
 */
function getNextPostInfo($postId=0){
  global $post;
  $originGlobalPost = $post;
  //使用传入id的文章
  if($postId !== 0){
    $post = get_post( $postId );
  }
  $nextPost = get_next_post();
  if ( '' == $nextPost ) {
      return [];
  }
  //把前一篇文章赋值给当前文章
  $post=$nextPost;
  $res = [
    'title'=>get_the_title(),
    'url'=>get_the_permalink(),
  ];
  //把最初的文章赋值给当前文章
  $post=$originGlobalPost;
  return $res;
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

/**
 * errorCode: 0
 * msg: "操作成功"
 * requestUrl: "PUT /rws/siteType/update/8"
 */
function success($method,$action,$msg='操作成功'){
  header('Content-Type:application/json');
  echo json_encode([
    'errorCode'=>0,
    'msg'=>$msg,
    'requestUrl'=>$method . ' ' . $action,
  ]);
  die;
}

/**
 * errorCode: 0
 * msg: "操作成功"
 * requestUrl: "PUT /rws/siteType/update/8"
 */
function failed($method,$action,$msg='操作失败',$errorCode=ErrorCodes::COMMON_ERROR){
  header('Content-Type:application/json');
  echo json_encode([
    'errorCode'=>$errorCode,
    'msg'=>$msg,
    'requestUrl'=>$method . ' ' . $action,
  ]);
  die;
}
