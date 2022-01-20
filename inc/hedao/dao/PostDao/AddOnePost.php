<?php

namespace hedao\dao;

class AddOnePost{

  /**
   * @description 新增一篇文章
   * @param int $id 文章ID, 0表示不指定id的新增, 其他则表示指定id的新增
   * @param string title 文章标题
   * @param string content 文章内容
   * @param number authorId 作者id
   * @param array categoryIdList 分类id列表
   * @param array tagIdList 标签id列表
   * @param array metaList 元信息列表
   * @param string status 文章状态 'publish', 'draft', 'future', 'private'
   * @param date create_time
   * @return 文章id, 如果不成功则返回0
   */
  public function run(
    $id, //ID
    $title, //标题
    $content, //内容
    $authorId, //作者id
    $categoryIdList, //分类id列表
    $tagIdList, //标签id列表
    $metaList, //元信息列表
    $status='publish', //文章状态 
    $create_time=null //创建日期
  ){

    $config = [
      'post_title'=>$title, //文章标题
      'post_content'=>$content, //文章内容
      'post_author'=>$authorId, //作者id
      'post_category'=>$categoryIdList, //文章所属分类id列表
      'tags_input'=>$this->_getTagIdList($tagIdList), //文章标签列表, 可以是name, slug 或ID
      'post_status'=>$status, //文章状态, 默认draft
      'meta_input'=>$metaList, 
    ];

    if(!empty($create_time)){
      $config['post_date'] = $create_time;
    }

    //如果是翻新的插入则指定id
    if($id != 0){
      $config['import_id'] = $id;
    }
    // 'import_id'         =>  3333,
    // $res = (int)wp_insert_post($config);
    $res = (int)wp_insert_post($config);
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

