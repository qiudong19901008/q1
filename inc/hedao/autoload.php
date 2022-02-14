<?php


namespace hedao;

define('THEME_LOCAL_PATH',get_template_directory());
define('THEME_HTTP_PATH',get_template_directory_uri());

require_once __DIR__ . '/config/config.php';

require_once __DIR__ .'/inc/codestar/codestar.php'; 

require_once __DIR__ . '/core/Loader.php';

require_once __DIR__ . '/lib/helper/helper.php';
require_once __DIR__ . '/lib/exceptions.php';

use hedao\api\v1\PostRouter;
use hedao\api\v1\TokenRouter;
use hedao\core\Loader;
use hedao\lib\metaBox\MetaBoxCommon;
use hedao\lib\metaBox\MetaBoxOutsideThumbnail;
use hedao\lib\support\SupportViewCount;
use hedao\lib\support\SupportCustomMenu;

Loader::run();

// api-v1
require_once __DIR__ . '/api/v1/PostRouter.php';
require_once __DIR__ . '/api/v1/TokenRouter.php';


class Hedao{
  
  public static function basic($postTypeArr= ['page','post']){
    MetaBoxCommon::getInstance([
      'postTypeArr' => $postTypeArr,
    ]);
    MetaBoxOutsideThumbnail::getInstance([
      'postTypeArr' => $postTypeArr,
    ]);
    SupportViewCount::getInstance([
      'postTypeArr' => $postTypeArr,
    ]);
    SupportCustomMenu::getInstance();

    self::registeHedaoV1Api();
  }

  //注册合道V1版本api
  public static function registeHedaoV1Api(){
    TokenRouter::getInstance();
    PostRouter::getInstance();
    // PostRouter
  }


}


