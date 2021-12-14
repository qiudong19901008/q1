<?php


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
  json([
    'list'=>$res,
    'count'=>count($res),
  ]);
}
add_action('wp_ajax_nopriv_q1_api_get_comment_list', 'getCommentListRouter');
add_action('wp_ajax_q1_api_get_comment_list', 'getCommentListRouter');

