<?php 

require_once plugin_dir_path(__FILE__) . './CommentQuery.php';

class CommentDao{

   /**
   * @description 查询评论
   * @param int $postId 文章id列表
   * @param string $orderBy 排序的字段名称, 比如 comment_date
   * @param 'DESC'|'ASC' $order 排序的方式, 倒叙或正序
   * @param int $page 第几页
   * @param int $size 大小
   */
  public static function query($postId,$orderBy='comment_date',$order='DESC',$page=1,$size=10){
    $commentQuery = new CommentQuery();
    return $commentQuery->query($postId,$orderBy,$order,$page,$size);
  }

}
