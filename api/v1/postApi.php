<?php

/**
 * @description 给文章点赞
 * @action q1_api_like_post
 * @method POST
 */
function likePostRouter(){
  $id = $_POST["postId"];
  $likeCount = PostService::likePostById($id);
  setQ1Cookie(
    'q1_cookie_like_post',
    $id,
    '/'.$id.'.html',
    60*60*24*90
  );
  json([
    'likeCount'=>$likeCount,
  ]);
}
add_action('wp_ajax_nopriv_q1_api_like_post', 'likePostRouter');
add_action('wp_ajax_q1_api_like_post', 'likePostRouter');