<?php


/**
 * 文章点赞
 */
function q1_post_like_callback(){
  global $wpdb,$post;
  $id = $_POST["postId"];
  // $action = $_POST["action"];
  $q1_post_like_count= get_post_meta($id,'q1_post_like_count',true);
  $expire = time() + 99999999;
  $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
  setcookie('q1_post_like_'.$id,$id,$expire,'/',$domain,false);
  if (!$q1_post_like_count || !is_numeric($q1_post_like_count)) {
    update_post_meta($id, 'q1_post_like_count', 1);
  }else {
    update_post_meta($id, 'q1_post_like_count', ($q1_post_like_count + 1));
  }
  echo get_post_meta($id,'q1_post_like_count',true);
  die;
}
add_action('wp_ajax_nopriv_q1_post_like_action', 'q1_post_like_callback');
add_action('wp_ajax_q1_post_like_action', 'q1_post_like_callback');