<?php

// $res = CommentDao::query('71','comment_date','DESC',1,1);

// var_dump($res);

// comment_content 内容
// comment_date 时间
// comment_ID id
// reply_person_name


//  $res = CommentService::getCommentListByPostId('71',1,1);

//  var_dump($res);



//先查询出该文章的所有评论
$args = [
  'post_id'=>71,
  // 'number' => 4,
  // 'offset' => 0,
  // 'parent' =>0, //没有父级的分类
  'orderby' => 'comment_date',
  'order' => 'DESC',
  'status' =>'approve', //通过审核的
];

$res = get_comments($args);

//提取前4条顶级评论
$topCommentList = [];
// $top
for($i=0;$i<4;$i++){
  // 如果是顶级评论
  if(isTopComment($res[$i])){
    array_push($topCommentList,$res[$i]);
  }
}

function isTopComment($comment){
  return $comment->comment_parent == '0';
}

//找到top评论的子评论
foreach($topCommentList as $topComment){
  $offspringCommentList = recurseFindOffspringCommentList($topComment,$res);
  $topComment = extractNeedData($topComment);
  $topComment['offspring'] = $offspringCommentList;
  var_dump( $topComment);
  break;
}

function recurseFindOffspringCommentList($topComment,$commentList){
  $res = [];
  $topId = $topComment->comment_ID;
  for($i=0;$i<count($commentList);$i++){
    if($topId == $commentList[$i]->comment_parent){
      $data = extractNeedData($commentList[$i],$topComment);
      array_push($res,$data);
      //继续找到它的子集
      $subRes = recurseFindOffspringCommentList($commentList[$i],$commentList);
      $res = array_merge($res,$subRes);
    }
  }
  return $res;
}

// comment_content 内容
// comment_date 时间
// comment_ID
// comment_parent
// reply_person_name 

function extractNeedData($comment,$parentComment=NULL){
  $res = [
    'commentId' =>$comment->comment_ID,
    'commentDate' =>$comment->comment_date,
    'commentContent' =>$comment->comment_author,
    'commentParentId' =>$comment->comment_parent,
  ];
  if($parentComment){
    $res['replyPersonName'] = $parentComment->comment_author;
  }
  return $res;
}

// function orderByCommentDate($offspringCommentList){

// }