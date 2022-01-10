<?php


/**
 * 定义常量
 */

define('HEDAO_DIR_PATH',get_template_directory());
define('HEDAO_ROOT_URL',get_template_directory_uri());

define('Q1_VERSION','1.0');


require_once get_template_directory() . '/vendor/autoload.php';

require_once HEDAO_DIR_PATH . '/config/config.php';

require_once HEDAO_DIR_PATH . '/core/loadTheme.php';
require_once HEDAO_DIR_PATH . '/core/autoloader.php';
require_once HEDAO_DIR_PATH . '/core/traits/TSingleton.php';
require_once HEDAO_DIR_PATH . '/core/helper/helper.php';

require_once HEDAO_DIR_PATH . '/core/dao/CategoryDao/CategoryDao.php';
require_once HEDAO_DIR_PATH . '/core/dao/CommentDao/CommentDao.php';
require_once HEDAO_DIR_PATH . '/core/dao/PostDao/PostDao.php';
require_once HEDAO_DIR_PATH . '/core/dao/PostMetaDao/PostMetaDao.php';
require_once HEDAO_DIR_PATH . '/core/dao/TagDao/TagDao.php';
require_once HEDAO_DIR_PATH . '/core/dao/UserDao/UserDao.php';



loadTheme();




// codestar框架
// require_once get_theme_file_path() .'/inc/codestar-framework/codestar-framework.php';









