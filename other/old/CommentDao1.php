<?php


// class CommentDao {

//   /**
//    * @description 查询评论
//    * @param string $postIdList 文章id列表, 格式: [1,2,3]
//    * @param string $orderBy 排序的字段名称, 比如 comment_date
//    * @param 'DESC'|'ASC' $order 排序的方式, 倒叙或正序
//    * @param int $page 第几页
//    * @param int $size 大小
//    */
//   public static function query($postIdList,$orderBy,$order,$page,$size){
//     $comments_query = new WP_Comment_Query; 
//     $args = [
//       'number' => $size, //每页大小
//       'offset' => CommentDao::_getOffset($page,$size), //偏移量
//       'post__in' => $postIdList, //文章id
//       'orderby' => $orderBy, //排序字段
//       'order' => $order //排序方式
//     ];
//     return $comments_query->query( $args );
//   }

//   private static function _getOffset($page,$size){
//     if(!$page){
//       return 0;
//     }else{
//       return ($page-1)*$size;
//     }
//   }

// }

