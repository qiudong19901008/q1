<?php

// require_once plugin_dir_path(__FILE__) . '/dao/commentDao.php';

// comment_content 内容
// comment_date 时间
// comment_author 评论者
// comment_ID id
// reply_to_who 回复了谁, 父级为空

class CommentService{



  public static function getCommentListByPostId($postId,$page=1,$size=10){
    $commentList = CommentDao::query([$postId],'comment_date','DESC',$page,$size);
    return $commentList;
  }

  /**
   * 获取所有的顶级评论
   */
  private static function _getTopCommentList($commentList){
    $topCommentList = [];
    $otherCommentList = [];
    foreach($commentList as $comment){
      if($comment['comment_parent'] == '0'){
        array_push($topCommentList,$comment);
      }else{
        array_push($otherCommentList,$comment);
      }
    }


  }

  /**
   * 找到该评论的顶级评论
   */
  private static function _findTopComment($notTopComment,$commentList){
    $parentName = '';
    $parentId = $notTopComment['comment_parent'];
    foreach($commentList as $comment){
      if($comment['comment_parent'] == $parentId){
        $parentName = $comment['comment_author'];
      }
    }
    //循环完了没有找到父级
    if(!$parentName){
      return false;
    }
  }

  /**
   * 提取出需要的数据
   */
  private static function _extractNeededData($comment){
    $data = [
      'comment_author' => $comment['comment_author'],
      'comment_content' => $comment['comment_content'],
      'comment_date' => $comment['comment_date'],
      'comment_ID' => $comment['comment_ID'],
      'comment_author' => $comment['comment_author'],
    ];
    return $data;
  }

}

