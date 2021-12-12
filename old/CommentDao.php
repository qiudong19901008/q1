<?php

// require_once plugin_dir_path(__FILE__) . './BaseDao.php';



// // 对数据库的操作

// class CommentDao extends BaseDao{

//   /**
//    * @description 查询评论
//    * @param array $postIdList 文章id列表
//    * @param string $orderBy 排序的字段名称, 比如 comment_date
//    * @param 'DESC'|'ASC' $order 排序的方式, 倒叙或正序
//    * @param int $page 第几页
//    * @param int $size 大小
//    */
//   public static function query($postIdList,$orderBy,$order,$page,$size){
//     global $wpdb;
//     $postIdListStr = implode(',', $postIdList);
//     $orderSection = CommentDao::getOrderSection($order,$orderBy);
//     $paginationSection = CommentDao::getPaginationSection($page,$size);
//     $sql = "
//       select * from {$wpdb->prefix}comments 
//       where 1=1 
//       and comment_approved = 1
//       and comment_post_ID in ({$postIdListStr})
//       {$orderSection}
//       {$paginationSection}
//     ";
//     return $wpdb->get_results($sql);
//   }

// }



