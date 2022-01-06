<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';
require_once plugin_dir_path(__FILE__) . './QueryPostList.php';
require_once plugin_dir_path(__FILE__) . './AddOnePost.php';
require_once plugin_dir_path(__FILE__) . './UpdateOnePost.php';
require_once plugin_dir_path(__FILE__) . './DeleteOnePost.php';


class PostDao extends BasePostDao{

 


  /**
   * @description 查询文章
   * @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='',$categorySlug='',$tagSlug='']
   * @param Array $excludePostIdList 需要排除的文章id列表
   * @param Array $includePostIdList 需要包含的文章id列表
   * @param array ['author'|'category'|'meta'|'tag']— $includeTableNameList 包含的额外表名列表
   * @param array $metaNameList — 额外字段的名字列表, 如果没有包含meta表则会忽略该选项
   * @param 'create_time'|'update_time'|'rand' $orderBy 需要排序的字段 默认创建时间
   * @param 'ASC'|'DESC' 升序或降序,默认降序
   * @param int $page 页码
   * @param int $size 数量
   * @param string $orderByMetaKey 需要被排序的metaKey, 如果传入了$orderBy则会忽略该配置, 如果metaNameList没包含也会忽略
   * @return Array
   */
  public static function queryPostList(
      $dynamicConditionList,
      $excludePostIdList=null,
      $includePostIdList=null,
      $includeTableNameList=[],
      $metaNameList=[],
      $orderBy='create_time',
      $order='DESC',
      $page=1,
      $size=10,
      $orderByMetaKey=''
    ){

    $querier = new QueryPostList();
    return $querier->run(
      $dynamicConditionList,
      $excludePostIdList,
      $includePostIdList,
      $includeTableNameList,
      $metaNameList,
      $orderBy,
      $order,
      $page,
      $size,
      $orderByMetaKey,
    );
  }


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
  public static function addOnePost(
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
    $deleter = new DeleteOnePost();
    $res = $deleter->run($id);
    return $res;
  }


  



  

    




  


}

