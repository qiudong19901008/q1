<?php

class GetPostThumbUrl{

  public static function run($myPost){
    $thumbUrl = get_the_post_thumbnail_url( $myPost->ID);
    if($thumbUrl){
      return $thumbUrl;
    }
    //如果没设置缩略图, 则获取文章第一张图片
    $thumbUrl = GetPostThumbUrl::_getArticleFirstImgUrl($myPost->post_content);
    if(!empty($thumbUrl)){
      return $thumbUrl;
    }
    //如果还找不到, 就获取全局缩略图
    $thumbUrl = GetPostThumbUrl::_getGlobalThumbUrl();
    if(!empty($thumbUrl)){
      return $thumbUrl;
    }
    //如果还没有则返回空
    return '';
  }

  private static function _getArticleFirstImgUrl($content){
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    return $matches[1][0];
  }

  private static function _getGlobalThumbUrl(){
    return getQ1Option(Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMB);
  }



}
