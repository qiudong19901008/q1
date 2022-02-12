<?php

namespace hedao\dao;

require_once plugin_dir_path(__FILE__) . './QueryPostList.php';
require_once plugin_dir_path(__FILE__) . './AddOnePost.php';
require_once plugin_dir_path(__FILE__) . './UpdateOnePost.php';


class PostDao{

  /**
   * @param array $categoryConditionList [categoryIdListIn:int[], categoryIdListAnd:int[], categoryIdListNotIn:int[], categorySlugListIn:string[], categorySlugListAnd:string[]]
   * @param array $tagConditionList [tagIdListIn:int[], tagIdListAnd:int[], tagIdListNotIn:int[], tagSlugListIn:string[], tagSlugListAnd:string[]]
   * @param array $authorConditionList [authorIdListIn:int[], authorIdListNotIn:int[], authorNickname:string]
   * @param array $postConditionList [postType:'page'|'post' ,postIdListIn:int[], postIdListNotIn:int[]]
   * @param string $s 查询字符串
   * @param array $postStatusList ['publish'|'private'|'pending'|'draft'...] 
   * @param string $orderBy 'create_time'|'update_time'|'comment_count'|'rand'|$meta_key
   * @param string $order 'DESC'|'ASC'
   * @param int $page 
   * @param int $size 
   * @param array $includeTableNameList 包含的额外表名列表('author'|'category'|'meta'|'tag')[]
   * @param array $metaNameList string[]
   */
  public static function queryPostList(
    $categoryConditionList,
    $tagConditionList,
    $authorConditionList,
    $postConditionList,
    $s,
    $postStatusList,
    $orderBy,
    $order,
    $page,
    $size,
    $includeTableNameList=[],
    $metaNameList=[]
  ){
    $worker = new QueryPostList();
    return $worker->run(
      $categoryConditionList,
      $tagConditionList,
      $authorConditionList,
      $postConditionList,
      $s,
      $postStatusList,
      $orderBy,
      $order,
      $page,
      $size,
      $includeTableNameList,
      $metaNameList
    );
  }

 

  /**
   * @description 新增一篇文章
   * @param int $id 文章ID, 0表示不指定id的新增, 其他则表示指定id的新增
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
  public static function addOnePost(
    $id, //ID
    $title, //标题
    $content, //内容
    $authorId, //作者id
    $categoryIdList, //分类id列表
    $tagIdList, //标签id列表
    $metaList, //元信息列表
    $status='publish', //文章状态
    $create_time=null
  ){
    $adder = new AddOnePost();
    $res = $adder->run(
      $id,
      $title,
      $content,
      $authorId,
      $categoryIdList,
      $tagIdList,
      $metaList,
      $status,
      $create_time,
    );
    return $res;
  }



   /**
   * @description 更新一篇文章
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
  public static function updateOnePost(
    $id,
    $title, //标题
    $content, //内容
    $authorId, //作者id
    $categoryIdList, //分类id列表
    $tagIdList, //标签id列表
    $metaList, //元信息列表
    $status='publish' //文章状态
  ){
    $updater = new UpdateOnePost();
    $res = $updater->run(
      $id,
      $title,
      $content,
      $authorId,
      $categoryIdList,
      $tagIdList,
      $metaList,
      $status,
    );
    return $res;
  }


  /**
   * @description 删除一篇
   * @param number id 文章id
   * @return 0|1 删除失败则返回0, 成功则是1
   */
  public static function deleteOnePost($id){
    $res = 0;
    $result = wp_delete_post($id,true); //WP_POST|null|false 成功则返回被删除的数据, 失败则null|false
    if($result){
      $res = 1;
    }
    return $res;
  }
  


   /**
   * @description 获取上一篇或下一篇文章, 默认获取上一篇
   * @param boolean $isNext 是否是下一篇
   * @param number $postId 文章id, 如果不传入则使用当前的文章id
   * @return Array 
   */
  public static function getPrevOrNextPostInfo( $isNext=false,$postId=0) {
    global $post;
    $originGlobalPost = $post;
    //使用传入id的文章
    if($postId !== 0){
      $post = get_post( $postId );
    }
    if($isNext){
      $resPost = get_next_post();
    }else{
      $resPost = get_previous_post();
    }
    if ( empty($resPost) ) {
      return [];
    }
    //把前一篇文章赋值给当前文章
    $post=$resPost;
    $res = [
      'title'=>get_the_title(),
      'url'=>get_the_permalink(),
    ];
    //把最初的文章赋值给当前文章
    $post=$originGlobalPost;
    return $res;
  }

  



  

    




  


}

