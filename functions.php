<?php


/**
 * 定义常量
 */
define('CSS_HOME',get_template_directory_uri() . '/public/css/');
define('JS_HOME',get_template_directory_uri() . '/public/js/');
define('ROOT_URI',get_template_directory_uri() . '/');
define('VERSION','1.0');

define('APP_HOME', '/app/');


// 加载小工具
require_once plugin_dir_path(__FILE__) . '/lib/widget/WidgetAuthor.php';
require_once plugin_dir_path(__FILE__) . '/lib/widget/WidgetRecommendPosts.php';
require_once plugin_dir_path(__FILE__) . '/lib/widget/WidgetSearch.php';
require_once plugin_dir_path(__FILE__) . '/lib/widget/WidgetTagCloud.php';


//主题支持
require_once plugin_dir_path(__FILE__) . '/lib/registe/registeCssJs.php'; //加载css js
require_once plugin_dir_path(__FILE__) . '/lib/registe/registeWidget.php'; //加载小工具
require_once plugin_dir_path(__FILE__) . '/lib/registe/registeMenu.php'; //加载菜单

//常量
require_once plugin_dir_path(__FILE__) . '/lib/constant/Options.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/Fields.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/Actions.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/Cookies.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/ErrorCodes.php';

//metabox
require_once plugin_dir_path(__FILE__) . '/lib/metaBox/PostMetaBoxList.php';
require_once plugin_dir_path(__FILE__) . '/lib/metaBox/CategoryMetaBoxList.php';
// CategoryMetaBoxList

//帮助函数
require_once plugin_dir_path(__FILE__) . '/lib/helper/helper.php';


//加载APP
require_once plugin_dir_path(__FILE__) . APP_HOME . 'lib/helper.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'lib/Configs.php';

// dao
require_once plugin_dir_path(__FILE__) . APP_HOME . 'dao/CommentDao/CommentDao.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'dao/PostDao/PostDao.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'dao/CategoryDao/CategoryDao.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'dao/TagDao/TagDao.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'dao/PostMetaDao/PostMetaDao.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'dao/UserDao/UserDao.php';

// service
require_once plugin_dir_path(__FILE__) . APP_HOME . 'service/PostService/PostService.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'service/CommentService/CommentService.php';

// api
require_once plugin_dir_path(__FILE__) . APP_HOME . 'api/v1/postApi.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'api/v1/commentApi.php';

// redux
if ( 
  !class_exists( 'ReduxFramework' ) 
  && file_exists( dirname( __FILE__ ) . '/inc/redux-framework/framework.php' )
  && file_exists( dirname( __FILE__ ) . '/config/reduxConfig/reduxConfig.php')
) {
require_once( dirname( __FILE__ ) . '/inc/redux-framework/framework.php' );
require_once( dirname( __FILE__ ) . '/config/reduxConfig/reduxConfig.php' );
}

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
  $oldView = (int)get_post_meta($postId,Fields::Q1_FIELD_POST_VIEW_COUNT,true);
  update_post_meta($postId, Fields::Q1_FIELD_POST_VIEW_COUNT, ($oldView+1));
}
add_action('wp_head', 'updatePostViewCount');


//支持文章缩略图
add_theme_support('post-thumbnails');

new PostMetaBoxList();