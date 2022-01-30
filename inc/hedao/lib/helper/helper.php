<?php

namespace hedao\lib\helper;

// require_once __DIR__ . '/GetPostThumbUrl.php';
// require_once __DIR__ . '/GetMenuData.php';
// require_once __DIR__ . '/JwtAuth.php';




/**
 * @description 获取值, 空则使用默认值
 */
 function getValue(&$value,$default){
  return !empty($value)?$value:$default;
 }

 /**
  * @description 根据键获取数组中对应的值, 空则返回默认
  * @param array $arr
  * @param string $key
  * @param mix $default 默认值
  */
 function getValueFromArrByKey(&$arr,$key,$default){
  return !empty($arr[$key])?$arr[$key]:$default;
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
function success($msg='操作成功'){
  header('Content-Type:application/json');
  echo json_encode([
    'errorCode'=>0,
    'msg'=>$msg,
  ]);
  die;
}

/**
 * errorCode: 0
 * msg: "操作失败"
 * requestUrl: "PUT /rws/siteType/update/8"
 */
function failed($msg='操作失败',$errorCode=null){
  header('Content-Type:application/json');
  echo json_encode([
    'errorCode'=>$errorCode?$errorCode:9999,
    'msg'=>$msg,
  ]);
  die;
}

/**
 * @description 获取$_GET的参数
 */
function getGETValue($name,$default=null){ 
  $val = !empty($_GET[$name]) ? $_GET[$name] : $default; 
  return $val; 
}

function getPOSTValue($name,$default=null){ 
  $val = !empty($_POST[$name]) ? $_POST[$name] : $default; 
  return $val; 
}

function getPostThumbUrl($myPost,$default=''){
  return GetPostThumbUrl::run($myPost,$default);
}

function getMenuDataByLocation($location){
  return GetMenuData::run($location);
}


/**
 * 是否是奇数
 */
 function isOddNumber($num){
  if($num%2 == 1){
    return true;
  }
  return false;
 }

 /**
 * @param int $uid 用户id
 * @param int $howLongExpire 多久过期
 * @param string $salt 盐
 */
 function generateToken($uid,$howLongExpire,$salt){
   return JwtAuth::generateToken($uid,$howLongExpire,$salt);
 }

 /**
 * @param string $token 令牌
 * @param string $salt 盐
 */
function getUidFromToken($token,$salt){
  $res = JwtAuth::getUidFromToken($token,$salt);
  return $res;
}

/**
 * @description 解码basic的header, 获取token
 * @param string $basicValue 头部authention的值
 * @param string $suffix 后缀,可以弄一些加密字符
 */
function getTokenFromBasicAuth($basicValue,$suffix=''){
  // `Basic ${Base64.encode(token+':')}`;
  $res = ltrim($basicValue,'Basic ');
  $res = base64_decode($res);
  return rtrim($res,$suffix);
}

/**
 * @param \WP_REST_Request $request
 */
function getBasicToken($request,$suffix=''){
  $basicAuth = $request->get_header('authorization');
  if(!$basicAuth){
    return '';
  }
  return getTokenFromBasicAuth($basicAuth,$suffix);
}


function isNotEmptyArr(&$value){
  return isset($value) && is_array($value) && !empty($value);
}


function isEmptyArr(&$value){
  return !isset($value) || !is_array($value) || empty($value);
}

function isNotEmptyStr(&$value){
  return isset($value) && is_string($value) && !empty($value);
}

function isNotEmptyParamInGet($key){
  return isset($_GET[$key]) && !empty($_GET[$key]);
}

/**
 * 获取网站title
 */
function getSeoTitle($withSiteName=true,$echo=true){
  $connector = ' - '; //标题连接符
  $siteName = get_option('blogname');
  if(is_home()){
    $title = $siteName;
  }else if(is_category()){
    $title = single_cat_title('',false);
  }else if(is_tag()){
    $title = single_tag_title('',false);
  }else if(is_search()){
    global $s;
    $title = $s;
  }else if(is_single()){
    $title = get_the_title();
    // $title = $postTitle . $connector . $siteName;
  }else if(is_page()){
    $title = get_the_title();
    // $title = $pageTitle . $connector . $siteName;
  }else if(is_404()){
    $title = '404';
  }

  if(!is_home() && $withSiteName){
    $title = $title . $connector . $siteName;
  }

  if($echo){
    echo $title;
  }else{
    return $title;
  }
  
}

/**
 * 获取seo描述
 */
function getSeoDescription($homeDescription,$postDescriptionFieldName,$echo=true){
  if(is_home()){
    return $homeDescription;
  }else if(is_category()){
    $res = strip_tags(category_description());
    if(empty($res)){
      $res = single_cat_title('',false);
    }
  }else if(is_tag()){
    $res = strip_tags(tag_description());
    if(empty($res)){
      $res = single_tag_title('',false);
    }
  }else if(is_search()){
    global $s;
    $res = $s;
  }else if(is_single()){
    $res = get_post_meta(get_the_ID(),$postDescriptionFieldName,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_page()){
    $res = get_post_meta(get_the_ID(),$postDescriptionFieldName,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_404()){
    $res = '404';
  }
  if($echo){
    echo $res;
  }else{
    return $res;
  }
}

/**
 * 获取seo关键词
 */
function getSeoKeywords($homeKeywords,$postKeywordsFieldName,$echo=true){
  if(is_home()){
    return $homeKeywords;
  }else if(is_category()){
    $res = single_cat_title('',false);
  }else if(is_tag()){
    $res = single_tag_title('',false);
  }else if(is_search()){
    global $s;
    $res = $s;
  }else if(is_single()){
    $res = get_post_meta(get_the_ID(),$postKeywordsFieldName,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_page()){
    $res = get_post_meta(get_the_ID(),$postKeywordsFieldName,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_404()){
    $res = '404';
  }
  if($echo){
    echo $res;
  }else{
    return $res;
  }
}

function getSiteName($echo=true){
  if($echo){
      echo get_option('blogname');
  }else{
      return get_option('blogname');
  }
}

function getSiteUrl($echo=true){
  if($echo){
    echo home_url();
  }else{
    return home_url();
  }
}

function transformSlugListToIdList($slugList=[]){
  $res = [];
  foreach($slugList as $slug){
    $id = url_to_postid($slug);
    array_push($res,$id);
  }
  return $res;
}

