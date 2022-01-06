<?php 

require_once plugin_dir_path(__FILE__) . './CommentQuery.php';

// namespace hedao\core\dao;

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

  /**
   * @description 添加一个评论
   * @param string $author 评论者名字 必填
   * @param string $content 评论内容 必填
   * @param string $postId 哪篇文章 必填
   * 
   * @param string $parentId 父级评论ID, 默认0
   * 
   * @param string $email 评论者邮箱, 默认空
   * @param string $authorUrl 评论者网址, 默认空
   * @param string $userId 关联哪个用户, 默认0
   */
  public static function addOneComment(
    $author, //评论者名字 必填
    $content, //评论内容 必填
    $postId, //哪篇文章 必填

    $parentId=0, //父级评论ID, 默认0

    $email='', //评论者邮箱, 默认空
    $authorUrl='', //评论者网址, 默认空
    $userId=0 //关联哪个用户, 默认0
  )
  
  {

    $commentId = wp_new_comment([
      'comment_author'=>$author,
      'comment_content'=>$content,
      'comment_post_ID'=>$postId,

      'comment_parent'=>$parentId,
      'comment_author_email'=>$email,
      'comment_author_url'=>$authorUrl,
      'user_id'=>$userId,
    ]);
    if(!$commentId){
      return false;
    }
    return true;
  }





}
