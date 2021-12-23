<?php

require_once plugin_dir_path(__FILE__) . '/GetMenuData.php';
require_once plugin_dir_path(__FILE__) . '/GetPostThumbUrl.php';

/**
 * @description 获取q1的配置项
 * @param string $optionName 选项名称
 * @param mix $type 类型 string,number,array,boolean
 */
function getQ1Option($optionName,$type='string'){
  $option = Redux::get_option(Options::Q1_OPTION_PREFIX,$optionName);
  if($option == '' && $type == 'array'){
    $option = [];
  }
  return $option;
}

function getQ1DefaultThumbUrl(){
  $data = getQ1Option(Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMB);
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
    $res = getQ1Option(Options::Q1_OPTION_HOME_DESCRIPTION);
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
    $res = get_post_meta(get_the_ID(),Fields::POST_DESCRIPTION,true);
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
    $res  = getQ1Option(Options::Q1_OPTION_HOME_KEYWORDS);
  }else if(is_category()){
    $res = single_cat_title('',false);
  }else if(is_tag()){
    $res = single_tag_title('',false);
  }else if(is_search()){
    global $s;
    $res = $s;
  }else if(is_single()){
    $res = get_post_meta(get_the_ID(),Fields::POST_KEYWORD,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }
  return $res;
}

function getMenuDataByLocation($location){
  return GetMenuData::run($location);
}

function getPostThumbUrl($myPost,$default=''){
  return GetPostThumbUrl::run($myPost,$default);
}

/**
 * 设置第一张图片为缩略图
 */
// function setFirstImgAsThumb() {
//   global $post;
//   $first_img_featured = '';
//   ob_start();
//   ob_end_clean();
//   $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
//   $first_img_featured = $matches [1] [0];
//   if(empty($first_img_featured)){ //Defines a default image
//   $first_img_featured = "/images/default.jpg";
//   }
//   return $first_img_featured;
//   }