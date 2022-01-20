<?php


namespace hedao\dao;

class QueryCategoryList extends BaseCategoryDao{

  /**
   * @description 查询分类列表
   * @param number $page
   * @param number $size
   */
  public function run(
    $page=1,
    $size=10
  ){
    $config = [
      'taxonomy' => 'category',
      'hide_empty' => false,
      'offset'=>$this->_getoffset($page,$size),
      'number'=>$size,
    ];
    $count = (int)wp_count_terms($config);
    $categoryList = get_terms($config);
    $list = $this->_extractNeededData($categoryList);
    return [
      'count'=>$count,
      'list'=>$list,
    ];
  }


  private function _getoffset($page,$size){
    return ($page-1)*$size; 
  }

  private function _extractNeededData($categoryList){
    $res = [];
    foreach($categoryList as $category){
      $one = [
        'id'=>$category->term_id,
        'name'=>$category->name,
        'slug'=>$category->slug,
      ];
      array_push($res,$one);
    }
    // utf8_encode($category->name)
    return $res;
  }


}