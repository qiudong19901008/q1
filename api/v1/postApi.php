<?

// require_once plugin_dir_path(__FILE__) . '../../service/PostService.php';

/**
 * @description 给文章点赞
 * @action q1_api_post_like
 * @method POST
 */
function likePostRouter(){
  // global $wpdb,$post;
  $id = $_POST["postId"];
  $likeCount = PostService::likePostById($id);
  setQ1Cookie('q1_cookie_like_post_'.$id,$id,60*60*24*90);
  json([
    'likeCount'=>$likeCount,
  ]);
  die;
}


add_action('wp_ajax_nopriv_q1_api_like_post', 'likePostRouter');
add_action('wp_ajax_q1_api_like_post', 'likePostRouter');