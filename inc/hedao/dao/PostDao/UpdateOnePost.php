<?php

namespace hedao\dao;

class UpdateOnePost{

  /**
   * @description 新增一篇文章
   * @param number id 文章id
   * @param string title 文章标题
   * @param string content 文章内容
   * @param number authorId 作者id
   * @param array categoryIdList 分类id列表
   * @param array tagIdList 标签id列表
   * @param array metaList 元信息列表
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
    $metaList, //元信息列表
    $status='publish' //文章状态 
  ){

    $config = [
      'ID'=>$id,
      'post_title'=>$title, //文章标题
      'post_content'=>$content, //文章内容
      'post_author'=>$authorId, //作者id
      'post_category'=>$categoryIdList, //文章所属分类id列表
      'tags_input'=>$this->_getTagIdList($tagIdList), //文章标签列表, 可以是name, slug 或ID
      'post_status'=>$status, //文章状态, 默认draft

    ];

    //使用这个更新postmeta 会置空 postmeta, 所以必须单独更新postmeta
    $res = (int)wp_update_post($config);
    foreach($metaList as $key=>$value){
      update_post_meta($id,$key,$value);
    }

    return $res;
  }


  private function _getTagIdList($tagIdList){
    $res = [];
    //把$tagIdList里面的元素转化为数字, 否则会被当成字符串新建一个标签
    foreach($tagIdList as $tagId){
      array_push($res,(int)$tagId);
    }
    return $res;
  }

}

