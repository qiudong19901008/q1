<?php


class UpdateOnePost{

  /**
   * @description 新增一篇文章
   * @param number id 文章id
   * @param string title 文章标题
   * @param string content 文章内容
   * @param number authorId 作者id
   * @param array categoryIdList 分类id列表
   * @param array tagIdList 标签id列表
   * @param string description seo描述
   * @param string keywords seo关键词
   * @param string status 文章状态 'publish', 'draft', 'future', 'private'
   * @return 文章id, 如果不成功则返回0
   */
  public function run(
    $id, //文章id
    $title, //标题
    $content, //内容
    $authorId, //作者id
    $categoryIdList, //分类id列表
    $tagIdList, //标签id列表
    $description, //描述 meta
    $keywords, //关键词 meta
    $status='publish' //文章状态 
  ){

    $config = [
      'ID'=>$id,
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

    $res = (int)wp_update_post($config);
    return $res;
  }

}

