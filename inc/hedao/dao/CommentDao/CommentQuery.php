<?php

namespace hedao\dao;

class CommentQuery{

  /**
   * @description 查询评论
   * @param int $postId 文章id列表
   * @param string $orderBy 排序的字段名称, 比如 comment_date
   * @param 'DESC'|'ASC' $order 排序的方式, 倒叙或正序
   * @param int $page 第几页
   * @param int $size 大小
   */
  public function query($postId,$orderBy,$order,$page,$size){
    $allCommentList = $this->_findAllCommentByPostId($postId,$orderBy,$order);
    $allTopCommentList = $this->_getAllTopCommentList($allCommentList);
    $neededTopCommentList = $this->_findNeededTopCommentList($allTopCommentList,$page,$size);
    $list = $this->_assembleNeededTopCommentList($neededTopCommentList,$allCommentList);
    $count = count($allTopCommentList);
    return [
      'list'=>$list,
      'count'=>$count,
    ];
  }

  private function _findAllCommentByPostId($postId,$orderBy,$order){
    $args = [
      'status' =>'approve', //通过审核的
      'post_id'=>$postId,
      'orderby' => $orderBy,
      'order' => $order,
    ];
    $res = get_comments($args);
    return $res;
  }

  private function _getAllTopCommentList($allCommentList){
    $res = [];
    for($i=0;$i<count($allCommentList);$i++){
      // 如果是顶级评论
      if($this->_isTopComment($allCommentList[$i])){
        array_push($res,$allCommentList[$i]);
      }
    }
    return $res;
  }

  private function _findNeededTopCommentList($allTopCommentList,$page,$size){
    $offset = ($page-1)*$size;
    return array_slice($allTopCommentList,$offset,$size);
  }

  /**
   * 重新组装返回的顶级评论
   */
  private function _assembleNeededTopCommentList($neededTopCommentList,$allCommentList){
    $res = [];
    foreach($neededTopCommentList as $topComment){
      $offspringCommentList = $this->_recurseFindOffspringCommentList($topComment,$allCommentList);
      $topComment = $this->_extractNeedData($topComment);
      $topComment['offspring'] = $offspringCommentList;
      array_push($res,$topComment);
    }
    return $res;
  }

  private function _isTopComment($comment){
    return $comment->comment_parent == '0';
  }

  private function _recurseFindOffspringCommentList($topComment,$allCommentList){
    $res = [];
    $topId = $topComment->comment_ID;
    for($i=0;$i<count($allCommentList);$i++){
      if($topId == $allCommentList[$i]->comment_parent){
        $data = $this->_extractNeedData($allCommentList[$i],$topComment);
        array_push($res,$data);
        //继续找到它的子集
        $subRes = $this->_recurseFindOffspringCommentList($allCommentList[$i],$allCommentList);
        $res = array_merge($res,$subRes);
      }
    }
    return $res;
  }

  
  
  /**
   *  comment_content 内容
   *  comment_date 时间
   *  comment_ID
   *  comment_parent
   *  reply_person_name
   * 
   */
  private function _extractNeedData($comment,$parentComment=NULL){
    $res = [
      'commentId' =>$comment->comment_ID,
      'commentDate' =>$comment->comment_date,
      'commentAuthor' =>$comment->comment_author,
      'commentParentId' =>$comment->comment_parent,
      'commentContent' =>$comment->comment_content,
    ];
    if($parentComment){
      $res['replyPersonName'] = $parentComment->comment_author;
    }
    return $res;
  }

}