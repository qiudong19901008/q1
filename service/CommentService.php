<?php

// require_once plugin_dir_path(__FILE__) . '/dao/commentDao.php';

class CommentService{

  public static function getCommentListByPostId($postId){
    $commentList = CommentDao::query([$postId],'comment_date','DESC',1,10);
    // foreach()
  }

  /**
   * 获取所有的顶级评论
   */
  private static function _getTopCommentList($commentList){
    foreach($commentList as $comment){
      // if($comment[''])
    }
  }

}

