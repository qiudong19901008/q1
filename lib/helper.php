<?php

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
  $siteDescription = get_option('blogdescription');
  if(is_home()){
    
  }else if(is_category()){
    
  }else if(is_tag()){
    
  }else if(is_search()){
    global $s;
    
  }else if(is_single()){
    
  }
}