<?php

class AddOnePost{

  /**
   * @description 新增一篇文章
   * @param string title 文章标题
   * @param string content 文章内容
   * @param number authorId 作者id
   * @param array categoryIdList 分类id列表
   * @param array tagIdList 标签id列表
   * @param string description seo描述
   * @param string keywords seo关键词
   * @param string status 文章状态 'publish', 'draft', 'future', 'private'
   * @param date create_time
   * @return 文章id, 如果不成功则返回0
   */
  public function run(
    $title, //标题
    $content, //内容
    $authorId, //作者id
    $categoryIdList, //分类id列表
    $tagIdList, //标签id列表
    $description, //描述 meta
    $keywords, //关键词 meta
    $status='publish', //文章状态 
    $create_time=null //创建日期
  ){

    $config = [
      'post_title'=>$title, //文章标题
      'post_content'=>$content, //文章内容
      'post_author'=>$authorId, //作者id
      'post_category'=>$categoryIdList, //文章所属分类id列表
      'tags_input'=>$tagIdList, //文章标签列表, 可以是name, slug 或ID
      'post_status'=>$status, //文章状态, 默认draft
      'meta_input'=>[
        Fields::Q1_FIELD_POST_DESCRIPTION=>$description,
        Fields::Q1_FIELD_POST_KEYWORDS=>$keywords,
      ], //元信息
    ];

    if(!empty($create_time)){
      $config['post_date'] = $create_time;
    }

    $res = wp_insert_post($config);
    return $res;
  }

}

