<?php

namespace hedao\dao;

use function hedao\lib\helper\{
  isNotEmptyArr,
  isNotEmptyStr,
};

class AssembleQueryArgs{


  public static function run(
    $categoryConditionList,
    $tagConditionList,
    $authorConditionList,
    $postConditionList,
    $s,
    $orderBy,
    $order,
    $page,
    $size
  ){
    $args = [
      'post_type'=>'post',
      'post_status'=>'publish',
      'order'=>$order,
      'offset'=>AssembleQueryArgs::_getoffset($page,$size),
      'posts_per_page'=>$size,
    ];
    $args = AssembleQueryArgs::_assembleCategoryArgs($categoryConditionList,$args);
    $args = AssembleQueryArgs::_assembleTagArgs($tagConditionList,$args);
    $args = AssembleQueryArgs::_assembleAuthorArgs($authorConditionList,$args);
    $args = AssembleQueryArgs::_assemblePostArgs($postConditionList,$args);
    $args = AssembleQueryArgs::_assembleSearchArg($s,$args);
    $args = AssembleQueryArgs::_assembleOrderByArg($orderBy,$args);
    return $args;
  }

  private static function _getoffset($page,$size){
    // var_dump($page);
    // var_dump($size);
    // die;
    return ($page-1)*$size; 
  }

  ///////////////////////////组装category条件/////////////////////////////////

  /**
   * 参数地址: https://developer.wordpress.org/reference/classes/wp_query/#category-parameters
   * @param array $categoryConditionList [categoryIdListIn:int[], categoryIdListAnd:int[], categoryIdListNotIn:int[], categorySlugListIn:string[], categorySlugListAnd:string[]]
   * @param array $args
   */
  private static function _assembleCategoryArgs($categoryConditionList,$args){
    // id的or关系
    if(isNotEmptyArr($categoryConditionList['categoryIdListIn'])){
      $args['category__in'] = $categoryConditionList['categoryIdListIn'];
    }
    // id的and关系
    if(isNotEmptyArr($categoryConditionList['categoryIdListAnd'])){
      $args['category__and'] = $categoryConditionList['categoryIdListAnd'];
    }
    // id的not or关系, 也就是不能包含列表中出现的, 哪怕一个都不行
    if(isNotEmptyArr($categoryConditionList['categoryIdListNotIn'])){
      $args['category__not_in'] = $categoryConditionList['categoryIdListNotIn'];
    }

    // slug的or关系
    if(isNotEmptyArr($categoryConditionList['categorySlugListIn'])){
      $args['category_name'] = implode(',',$categoryConditionList['categorySlugListIn']);
    }
    // slug的and关系
    if(isNotEmptyArr($categoryConditionList['categorySlugListAnd'])){
      $args['category_name'] = implode('+',$categoryConditionList['categorySlugListAnd']);
    }

    return $args;
  }

  ///////////////////////////组装tag条件/////////////////////////////////

  /**
   * 参数地址: https://developer.wordpress.org/reference/classes/wp_query/#tag-parameters
   * @param array $tagConditionList [tagIdListIn:int[], tagIdListAnd:int[], tagIdListNotIn:int[], tagSlugListIn:string[], tagSlugListAnd:string[]]
   * @param array $args
   */
  private static function _assembleTagArgs($tagConditionList,$args){
    // id的or关系
    if(isNotEmptyArr($tagConditionList['tagIdListIn'])){
      $args['tag__in'] = $tagConditionList['tagIdListIn'];
    }
    // id的and关系
    if(isNotEmptyArr($tagConditionList['tagIdListAnd'])){
      $args['tag__and'] = $tagConditionList['tagIdListAnd'];
    }
    // id的not or关系, 也就是不能包含列表中出现的, 哪怕一个都不行
    if(isNotEmptyArr($tagConditionList['tagIdListNotIn'])){
      $args['tag__not_in'] = $tagConditionList['tagIdListNotIn'];
    }

    // slug的or关系
    if(isNotEmptyArr($tagConditionList['tagSlugListIn'])){
      $args['tag_slug__in'] = $tagConditionList['tagSlugListIn'];
    }
    // slug的and关系
    if(isNotEmptyArr($tagConditionList['tagSlugListAnd'])){
      $args['tag_slug__and'] = $tagConditionList['tagSlugListAnd'];
    }

    return $args;
  }

  

  ///////////////////////////组装author条件/////////////////////////////////

  /**
   * 参数地址: https://developer.wordpress.org/reference/classes/wp_query/#author-parameters
   * @param array $authorConditionList [authorIdListIn:int[], authorIdListNotIn:int[], authorNickname:string]
   * @param array $args
   */
  private static function _assembleAuthorArgs($authorConditionList,$args){
    // id的or关系
    if(isNotEmptyArr($authorConditionList['authorIdListIn'])){
      $args['author__in'] = $authorConditionList['authorIdListIn'];
    }
    // id的not or关系, 也就是不能包含列表中出现的, 哪怕一个都不行
    if(isNotEmptyArr($authorConditionList['authorIdListNotIn'])){
      $args['author__not_in'] = $authorConditionList['authorIdListNotIn'];
    }

    // nickname
    if(isNotEmptyStr($authorConditionList['authorNickname'])){
      $args['author_name'] = $authorConditionList['authorNickname'];
    }
    return $args;
  }

  ///////////////////////////组装post条件/////////////////////////////////

  /**
   * 参数地址: https://developer.wordpress.org/reference/classes/wp_query/#author-parameters
   * @param array $authorConditionList [postIdListIn:int[], postIdListNotIn:int[]]
   * @param array $args
   */
  private static function _assemblePostArgs($postConditionList,$args){
    // id的or关系
    if(isNotEmptyArr($postConditionList['postIdListIn'])){
      $args['post__in'] = $postConditionList['postIdListIn'];
    }
    // id的not or关系, 也就是不能包含列表中出现的, 哪怕一个都不行
    if(isNotEmptyArr($postConditionList['postIdListNotIn'])){
      $args['post__not_in'] = $postConditionList['postIdListNotIn'];
    }
    return $args;
  }

  ///////////////////////////组装search条件/////////////////////////////////

  /**
   * 参数地址: https://developer.wordpress.org/reference/classes/wp_query/#search-parameters
   * @param array $authorConditionList [postIdListIn:int[], postIdListNotIn:int[]]
   * @param array $args
   */
  private static function _assembleSearchArg($s,$args){
    if(isNotEmptyStr($s)){
      $args['s'] = $s;
    }
    return $args;
  }


  ///////////////////////////组装排序条件/////////////////////////////////

  /**
   * 参数地址: https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
   * @param array $authorConditionList [authorIdListIn:id[], authorIdListNotIn:id[], authorNickname:string]
   * @param array $args
   */
  private static function _assembleOrderByArg($orderBy,$args){

    if(AssembleQueryArgs::_isNormalOrderBy($orderBy)){
      $args = AssembleQueryArgs::_assembelNormalOrderBy($orderBy,$args);
    }else{
      $args = AssembleQueryArgs::_assembelMetaOrderBy($orderBy,$args);
    }
    return $args;
  }

  /**
   * 是否是普通的orderby ,如果不是, 则是meta的orderby
   */
  private static function _isNormalOrderBy($orderBy){
    $normalConditionArr = ['create_time','update_time','rand','comment_count'];
    return in_array($orderBy,$normalConditionArr);
  }
  
  private static function _assembelNormalOrderBy($orderBy,$args){
    switch($orderBy){
      case 'create_time':
        $res = 'date';
        break;
      case 'update_time':
        $res = 'modified';
        break;
      default: 
        $res = $orderBy;
    }
    $args['orderby'] = $res;
    return $args;
  }

  private static function _assembelMetaOrderBy($orderBy,$args){
    $args['orderby'] = 'meta_value_num';
    $args['meta_key'] = $orderBy;
    return $args;
  }

}
