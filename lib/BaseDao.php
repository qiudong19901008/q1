<?php


class BaseDao{

  /**
   * @description 获取排序的sql部分
   * @param string $orderBy 排序的字段名称, 比如 comment_date
   * @param 'DESC'|'ASC' $order 排序的方式, 倒叙或正序
   */
  protected static function getOrderSection($order,$orderBy){
    $defaultOrder = 'DESC';
    //没有要排序的字段则不排序
    if(!$orderBy){ 
      return '';
    }
    //有排序字段, 但是没规定方向, 默认降序
    if($orderBy && $order){ 
      return "ORDER BY {$orderBy} {$defaultOrder}";
    }
    //正常排序
    return "ORDER BY {$orderBy} {$order}";
  }

  /**
   * @description 获取分页的sql部分
   * @param int $page 第几页
   * @param int $size 大小
   */
  protected static function getPaginationSection($page,$size){
    //没告诉尺寸则返回全部
    if(!$size){ 
      return '';
    }
    //计算偏移量
    if($size && $page){
      $offset = ($page-1)*$size;
    }else{ //没传入页码, 默认偏移量 0
      $offset = 0;
    }
    return "LIMIT {$size} OFFSET {$offset}";
  }

}