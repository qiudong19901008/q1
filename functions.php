<?php


/**
 * 定义常量
 */


define('CSS_HOME',get_template_directory_uri() . '/public/css/');
define('JS_HOME',get_template_directory_uri() . '/public/js/');
define('ROOT_URI',get_template_directory_uri() . '/');
define('HEDAO_VERSION','1.0');
define('Q1_VERSION','1.0');

define('APP_HOME', '/@app/');

/**
 * 合道主题本地根路径
 */
if(!define('HEDAO_DIR_PATH',get_template_directory())){
  define('HEDAO_DIR_PATH',get_template_directory());
}
if(!define('HEDAO_ROOT_URL',get_template_directory_uri())){
  define('HEDAO_ROOT_URL',get_template_directory_uri());
}


require_once HEDAO_DIR_PATH . '/core/autoloader.php';
require_once HEDAO_DIR_PATH . '/core/traits/TSingleton.php';



function getQ1ThemeInstance(){
  \q1\register\Q1Theme::getInstance();
}
/**
 * 加载Q1主题
 */
getQ1ThemeInstance();


//常量
require_once plugin_dir_path(__FILE__) . '/lib/constant/Options.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/Fields.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/Actions.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/Cookies.php';
require_once plugin_dir_path(__FILE__) . '/lib/constant/ErrorCodes.php';


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

// ajax
require_once plugin_dir_path(__FILE__) . APP_HOME . 'ajax/v1/postAjax.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'ajax/v1/commentAjax.php';

//API
require_once plugin_dir_path(__FILE__) . APP_HOME . 'api/v1/postApi.php';
require_once plugin_dir_path(__FILE__) . APP_HOME . 'api/v1/categoryApi.php';

// redux框架
if ( 
  !class_exists( 'ReduxFramework' ) 
  && file_exists( dirname( __FILE__ ) . '/inc/redux-framework/framework.php' )
  && file_exists( dirname( __FILE__ ) . '/config/reduxConfig/reduxConfig.php')
) {
require_once( dirname( __FILE__ ) . '/inc/redux-framework/framework.php' );
require_once( dirname( __FILE__ ) . '/config/reduxConfig/reduxConfig.php' );
}

// codestar框架
// require_once get_theme_file_path() .'/inc/codestar-framework/codestar-framework.php';




//禁用自动处理p标签
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );






