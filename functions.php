<?php

/**
 * 定义常量
 */
define('CSS_HOME',get_template_directory_uri() . '/asset/dist/css/');
define('JS_HOME',get_template_directory_uri() . '/asset/dist/js/');
define('ROOT_URI',get_template_directory_uri() . '/');
define('VERSION','1.0');

// 加载小工具
require_once plugin_dir_path(__FILE__) . '/widget/WidgetAuthor.php';
require_once plugin_dir_path(__FILE__) . '/widget/WidgetRecommendPosts.php';
require_once plugin_dir_path(__FILE__) . '/widget/WidgetSearch.php';
require_once plugin_dir_path(__FILE__) . '/widget/WidgetTagCloud.php';

// 加载主题支持
require_once plugin_dir_path(__FILE__) . '/core/registeCssJs.php'; //加载css js
require_once plugin_dir_path(__FILE__) . '/core/registeWidget.php'; //加载小工具
require_once plugin_dir_path(__FILE__) . '/core/registeMenu.php'; //加载菜单

//lib库
require_once plugin_dir_path(__FILE__) . '/lib/helper.php';
require_once plugin_dir_path(__FILE__) . '/lib/query.php';
require_once plugin_dir_path(__FILE__) . '/lib/htmlGetter.php';
require_once plugin_dir_path(__FILE__) . '/lib/Fields.php';
require_once plugin_dir_path(__FILE__) . '/lib/Configs.php';

// dao
require_once plugin_dir_path(__FILE__) . '/dao/CommentDao/CommentDao.php';
require_once plugin_dir_path(__FILE__) . '/dao/PostDao/PostDao.php';
require_once plugin_dir_path(__FILE__) . '/dao/CategoryDao/CategoryDao.php';
require_once plugin_dir_path(__FILE__) . '/dao/TagDao/TagDao.php';

// service
require_once plugin_dir_path(__FILE__) . '/service/PostService.php';

// api
require_once plugin_dir_path(__FILE__) . '/api/v1/postApi.php';
require_once plugin_dir_path(__FILE__) . '/api/v1/commentApi.php';



/**
 * 功能增强
 */

// 禁用古腾堡编辑器
// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);
// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );


// 修改excerpt结尾
function new_excerpt_more($more) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



//更新文章浏览量
function updatePostViewCount(){
  if (!is_singular()){
    return;
  }
  global $post;
  $postId = $post->ID;
  if(!$postId){
    return;
  }
  $oldView = (int)get_post_meta($postId,Fields::COUNT_POST_VIEW,true);
  update_post_meta($postId, Fields::COUNT_POST_VIEW, ($oldView+1));
}
add_action('wp_head', 'updatePostViewCount');




