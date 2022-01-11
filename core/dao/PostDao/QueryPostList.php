<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';


class QueryPostList extends BasePostDao{

  // * @param number $categoryId 需要被查询的分类id,默认0不规定分类id
  //  * @param number $tagId 需要被查询的分类id,默认0不规定标签id
  //  * @param string s 需要被查询的搜索字段,默认''没有搜索字段

  /**
   * @description 查询文章
   * @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='',$categorySlug='',$tagSlug='']
   * @param Array $excludePostIdList 需要排除的文章id列表
   * @param Array $includePostIdList 需要包含的文章id列表
   * @param Array $includeAuthorIdList 需要包含的作者id列表
   * @param array ['author'|'category'|'meta'|'tag'] — $includeTableNameList 包含的额外表名列表
   * @param array $metaNameList — 额外字段的名字列表, 如果没有包含meta表则会忽略该选项, 留空数组也会忽略
   * @param 'create_time'|'update_time'|'rand'|'comment_count' $orderBy 需要排序的字段 默认创建时间
   * @param 'ASC'|'DESC' 升序或降序,默认降序
   * @param int $page 页码
   * @param int $size 数量
   * @param string $orderByMetaKey 需要被排序的metaKey, 如果传入了$orderBy则会忽略该配置, 如果metaNameList没包含也会忽略
   * @return Array
   */
  public function run(
      $dynamicConditionList=[],
      $excludePostIdList=null,
      $includePostIdList=null,
      $includeAuthorIdList=null,
      $includeTableNameList=[],
      $metaNameList=[],
      $orderBy='create_time',
      $order='DESC',
      $page=1,
      $size=10,
      $orderByMetaKey=''
  ){
    $res = [];
    $args = [
      'author__in' => $includeAuthorIdList,
      'post__not_in'=>$excludePostIdList,
      'post__in'=>$includePostIdList,
      'post_type'=>'post',
      'post_status'=>'publish',
      'orderby'=>$this->_getOrderBy($orderBy),
      'order'=>$order,
      'offset'=>$this->_getoffset($page,$size),
      'posts_per_page'=>$size,
    ];
    $args = $this->_addDynamicCondition($dynamicConditionList,$args);
    $query = new WP_Query($args);
    $res = $this->getNeededData($query,$includeTableNameList,$metaNameList);
    if(QueryPostList::_isOrderByMeta($orderBy,$orderByMetaKey,$metaNameList)){
      $res = QueryPostList::_orderByMeta($res,$orderByMetaKey,$order);
    }
    $count = $query->found_posts;
    wp_reset_query();
    return [
      'list'=>$res,
      'count'=>$count,
    ];
  }

  private static function _isOrderByMeta($orderBy,$orderByMetaKey,$metaNameList){
    return empty($orderBy) && !empty($orderByMetaKey) && in_array($orderByMetaKey,$metaNameList);
  }


 

  /**
   *  @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='',$categorySlug='',$tagSlug='']
   */
  private function _addDynamicCondition($dynamicConditionList,$args){
    if(!empty($dynamicConditionList['categoryId'])){
      $args['cat'] = $dynamicConditionList['categoryId'];
    }
    if(!empty($dynamicConditionList['tagId'])){
      $args['tag_id'] = $dynamicConditionList['tagId'];
    }
    if(!empty($dynamicConditionList['s'])){
      $args['s'] = $dynamicConditionList['s'];
    }
    if(!empty($dynamicConditionList['categorySlug'])){
      $args['category_name'] = $dynamicConditionList['categorySlug'];
    }
    if(!empty($dynamicConditionList['tagSlug'])){
      $args['tag'] = $dynamicConditionList['tagSlug'];
    }
    return $args;
  }

  

  

  private function _getoffset($page,$size){
    return ($page-1)*$size;    
  }

  private function _getOrderBy($orderBy){
    $res = '';
    switch($orderBy){
      case 'update_time':
        $res = 'modified';
        break;
      case 'rand':
        $res = 'rand';
        break;
      case 'create_time':
        $res = 'date';
        break;
      default:
        $res = $orderBy;
    }
    return $res;
  }

  /**8***********************排序算法********************** */

  /**
   * @param array $myPostList 存放了所有数据的postlist
   * @param string $orderByMetaKey 排序的键
   * @param string 'DESC'|'ASC' $order
   */
  private static function _orderByMeta($myPostList,$orderByMetaKey,$order){
    $res=[];
    while(count($myPostList)>0){
      $bigest = QueryPostList::_findPostHaveBigestMetaValue($myPostList,$orderByMetaKey);
      //从原始myPostList中删除最大的元素,并重置索引
      unset($myPostList[$bigest['myPostKey']]);
      $myPostList = array_values($myPostList);
      //把最大元素放进结果集
      if(strtoupper($order) == 'DESC'){ // 倒叙排列, 由大到小
        array_push($res,$bigest['myPost']);
      }else{ //正序排列, 由小到大
        array_unshift($res,$bigest['myPost']);
      }
    }
    return $res;
  }


  private static function _findPostHaveBigestMetaValue($myPostList,$orderByMetaKey){
    //初始化
    $firstMyPost = $myPostList[0];
    $metaValue = (int)$firstMyPost['meta'][$orderByMetaKey];
    $bigest = [
      'metaValue'=>$metaValue, //存放当前最大的meta值, 用来和其他post做比较
      'myPostKey'=>0, //到最后根据键位来删除最大myPost
      'myPost'=>$firstMyPost   //最后返回的最大post
    ];
    //如果只剩下一个则直接返回
    if(count($myPostList) === 1){
      return $bigest;
    }
    //找出最大myPost
    foreach($myPostList as $myPostKey=>$myPost){
      $metaValue = (int)$myPost['meta'][$orderByMetaKey];
      if($metaValue > $bigest['metaValue']){
        $bigest = [
          'metaValue'=> $metaValue,
          'myPostKey'=>$myPostKey,
          'myPost'=>$myPost,
        ];
      }
    }
    return $bigest;
  }

}