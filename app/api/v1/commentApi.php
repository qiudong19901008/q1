<?php


/**
 * @description 拉取评论
 * @action q1_api_get_comments
 * @method GET
 */
function getCommentsRouter(){
  $postId = $_GET["postId"];
  $page = $_GET["page"];
  $size = $_GET["size"];
  $res = CommentDao::query($postId,'comment_date','DESC',$page,$size);
  json([
    'list'=>$res,
    'count'=>count($res),
  ]);
}
add_action('wp_ajax_nopriv_q1_api_get_comments', 'getCommentsRouter');
add_action('wp_ajax_q1_api_get_comments', 'getCommentsRouter');

// /**
//  * @description 拉取评论的html
//  * @action q1_api_get_comments
//  * @method GET
//  */
// function getCommentsHtmlRouter(){
//   $postId = $_GET["postId"];
//   $page = $_GET["page"];
//   $size = $_GET["size"];
//   $res = CommentDao::query($postId,'comment_date','DESC',$page,$size);
//   json([
//     'list'=>$res,
//     'count'=>count($res),
//   ]);
// }
// add_action('wp_ajax_nopriv_q1_api_get_comments', 'getCommentsRouter');
// add_action('wp_ajax_q1_api_get_comments', 'getCommentsRouter');