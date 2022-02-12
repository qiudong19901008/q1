<?php


namespace hedao\lib\helper;

use hedao\constant\MetaBoxOptions;

/**
 * 1. 获取seo标题
 * 2. 获取seo描述
 * 3. 获取seo关键词
 * 4. 获取网站名
 * 5. 获取网站主页链接
 * 5. 获取网站缩略图
 */


/**
 * 1. 获取seo标题
 */
function getSeoTitle($withSiteName=true){
  $connector = ' - '; //标题连接符
  $siteName = get_option('blogname');
  if(is_home()){
    $title = $siteName;
  }else if(is_category()){
    // single_term_title();
    $title = single_cat_title('',false);
  }else if(is_tag()){
    $title = single_tag_title('',false);
  }else if(is_tax()){
    $title = single_term_title();
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

  return $title;
  
}

/**
 * 2. 获取seo描述
 */
function getSeoDescription($homeDescription){
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
    $res = get_post_meta(get_the_ID(),MetaBoxOptions::HEDAO_COMMON_DESCRIPTION,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_page()){
    $res = get_post_meta(get_the_ID(),MetaBoxOptions::HEDAO_COMMON_DESCRIPTION,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_404()){
    $res = '404';
  }
  return $res;
}

/**
 * 3. 获取seo关键词
 */
function getSeoKeywords($homeKeywords){
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
    $res = get_post_meta(get_the_ID(),MetaBoxOptions::HEDAO_COMMON_KEYWORDS,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_page()){
    $res = get_post_meta(get_the_ID(),MetaBoxOptions::HEDAO_COMMON_KEYWORDS,true);
    if(empty($res)){
      $res = get_the_title();
    }
  }else if(is_404()){
    $res = '404';
  }
  return $res;
}

/**
 * 4. 获取网站名
 */
function getSiteName(){
  return get_option('blogname');
}

/**
 * 5. 获取网站主页链接
 */
function getSiteUrl(){
  return  get_home_url();
}

/**
 * 
 * 1. 获取文章缩略图
 * 2. 获取文章第一张图片
 */
function getPostThumbUrl($myPost){
  $thumbUrl = get_the_post_thumbnail_url( $myPost->ID);
    if($thumbUrl){
      return $thumbUrl;
    }
    //如果没设置缩略图, 则获取文章第一张图片
    $thumbUrl = getArticleFirstImgUrl($myPost->post_content);
    if(!empty($thumbUrl)){
      return $thumbUrl;
    }
    //如果还没有则返回空
    return '';
}