<?php
// /wp-json/q1/v1 

/**
 * @description 拉取评论
 * @action q1_api_get_comment_list
 * @method GET
 */
function getCommentListRouter(){
  $postId = $_GET["postId"];
  $page = $_GET["page"];
  $size = $_GET["size"];
  $res = CommentDao::query($postId,'comment_date','DESC',$page,$size);
  json($res);
}
add_action('wp_ajax_nopriv_' . Actions::Q1_ACTION_COMMENT_GET_COMMENT_LIST, 'getCommentListRouter');
add_action('wp_ajax_' . Actions::Q1_ACTION_COMMENT_GET_COMMENT_LIST, 'getCommentListRouter');


/**
 * @description 添加一条评论
 * @action q1_api_add_one_comment
 * @method POST
 */
function addOneCommentRouter(){
  $author = $_POST["author"];
  $content = $_POST["content"];
  $postId = $_POST["postId"];
  $parentId = $_POST["parentId"];

  $email = $_POST["email"];
  $url = $_POST["authorUrl"];
  $userId = $_POST["userId"]? $_POST["userId"]:0;
  $res = CommentDao::addOneComment($author,$content,$postId,$parentId,$email,$url,$userId);
  if($res){
    success('POST',Actions::Q1_ACTION_COMMENT_ADD_ONE_COMMENT);
  }else{
    failed('POST',Actions::Q1_ACTION_COMMENT_ADD_ONE_COMMENT);
  }
}
add_action('wp_ajax_nopriv_' . Actions::Q1_ACTION_COMMENT_ADD_ONE_COMMENT, 'addOneCommentRouter');
add_action('wp_ajax_' . Actions::Q1_ACTION_COMMENT_ADD_ONE_COMMENT, 'addOneCommentRouter');