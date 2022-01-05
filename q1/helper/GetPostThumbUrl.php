<?php

namespace q1;

class GetPostThumbUrl{


  public static function run($myPost,$default=''){
    $thumbUrl = get_the_post_thumbnail_url( $myPost->ID);
    if($thumbUrl){
      return $thumbUrl;
    }
    //如果没设置缩略图, 则获取文章第一张图片
    $thumbUrl = GetPostThumbUrl::_getArticleFirstImgUrl($myPost->post_content);
    if(!empty($thumbUrl)){
      return $thumbUrl;
    }
    //为了提高效率, 传入默认的缩略图, 这样就不用每次去取全局缩略图
    if(!empty($default)){
      return $default;
    }
    //如果还找不到, 就获取全局缩略图
    $thumbUrl = getQ1DefaultThumbUrl();
    if(!empty($thumbUrl)){
      return $thumbUrl;
    }
    //如果还没有则返回空
    return '';
  }

  private static function _getArticleFirstImgUrl($content){
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    if(empty($matches[1])){
      return '';
    }
    return $matches[1][0];
  }



}
