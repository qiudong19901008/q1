<?php


namespace q1\helper;
use \q1\constant\Options;
use \q1\constant\Fields;

/**
 * @description 获取q1的配置项
 * @param string $optionName 选项名称
 * @param mix $type 类型 string,number,array,boolean
 */
function getQ1Option($optionName,$type='string'){
  $option = \Redux::get_option(Options::Q1_OPTION_PREFIX,$optionName);
  if($option == '' && $type == 'array'){
    $option = [];
  }
  return $option;
}

function getQ1DefaultThumbUrl(){
  $data = getQ1Option(Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMBNAIL);
  return $data['url'];
}

/**
 * 获取网站title
 */
function getSeoTitle(){
  $connector = ' - '; //标题连接符
  $siteName = get_option('blogname');
  if(is_home()){
    $title = $siteName;
  }else if(is_category()){
    $categoryName = single_cat_title('',false);
    $title = $categoryName .  $connector . $siteName;
  }else if(is_tag()){
    $tagName = single_tag_title('',false);
    $title = $tagName . $connector . $siteName;
  }else if(is_search()){
    global $s;
    $title = $s . $connector . $siteName;
  }else if(is_single()){
    $postTitle = get_the_title();
    $title = $postTitle . $connector . $siteName;
  }
  return $title;
}

/**
 * 获取seo描述
 */
function getSeoDescription(){
  if(is_home()){
    $res = getQ1Option(Options::Q1_OPTION_HOME_BASIC_DESCRIPTION);
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
    $res = get_post_meta(get_the_ID(),Fields::Q1_FIELD_POST_DESCRIPTION,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }
  return $res;
}

/**
 * 获取seo关键词
 */
function getSeoKeywords(){
  if(is_home()){
    $res  = getQ1Option(Options::Q1_OPTION_HOME_BASIC_KEYWORDS);
  }else if(is_category()){
    $res = single_cat_title('',false);
  }else if(is_tag()){
    $res = single_tag_title('',false);
  }else if(is_search()){
    global $s;
    $res = $s;
  }else if(is_single()){
    $res = get_post_meta(get_the_ID(),Fields::Q1_FIELD_POST_KEYWORDS,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }
  return $res;
}

// function getMenuDataByLocation($location){
//   return GetMenuData::run($location);
// }

// function getPostThumbUrl($myPost,$default=''){
//   return GetPostThumbUrl::run($myPost,$default);
// }

/**
 * 获取自定义头部代码, 该区域可以放一些脚本, 比如谷歌广告代码
 */
function getHeaderCustomCode(){
  return getQ1Option(Options::Q1_OPTION_GLOBAL_HEADER_CUSTOM_CODE);
}

/**
 * 获取自定义头部代码, 该区域可以放一些脚本, 比如百度统计
 */
function getFooterCustomCode(){
  return getQ1Option(Options::Q1_OPTION_GLOBAL_FOOTER_CUSTOM_CODE);
}

/**
 * 获取页面类型
 */
function getPageType(){
  $res = '';
  if(is_home()){
    $res = 'index';
  }else if(is_category()){
    $res = 'category';
  }else if(is_tag()){
    $res = 'tag';
  }else if(is_single()){
    $res = 'post';
  }else if(is_search()){
    $res = 'search';
  }
  return $res;
}

  /**
   * @description 获取文章浏览量
   */
  function getPostViewCount($post_id){
    $count = get_post_meta( $post_id, Fields::Q1_FIELD_POST_VIEW_COUNT, true );
    return !empty($count)?$count:0;
  }

  /**
   * @description 获取文章点赞数量
   */
  function getPostLikeCount($post_id){
    $count = get_post_meta( $post_id, Fields::Q1_FIELD_POST_LIKE_COUNT, true );
    return !empty($count)?$count:0;
  }