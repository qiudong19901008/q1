<?php

// use CommentDao as GlobalCommentDao;

class CommentDao{


  /**
   * @description 查询评论
   * @param int $postId 文章id列表
   * @param string $orderBy 排序的字段名称, 比如 comment_date
   * @param 'DESC'|'ASC' $order 排序的方式, 倒叙或正序
   * @param int $page 第几页
   * @param int $size 大小
   */
  public static function query($postId,$orderBy,$order,$page,$size){
    $args = [
      'post_id'=>$postId,
      'number' => $size,
      'offset' => CommentDao::_getOffset($page,$size),
      'orderby' => $orderBy,
      'order' => $order,
    ];
    $res = get_comments($args);
  }

  private static function _getOffset($page,$size){
    if(!$page){
      return 0;
    }else{
      return ($page-1)*$size;
    }
  }

}