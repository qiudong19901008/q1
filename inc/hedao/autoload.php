<?php


namespace hedao;

define('THEME_LOCAL_PATH',get_template_directory());
define('THEME_HTTP_PATH',get_template_directory_uri());

require_once __DIR__ . '/config/config.php';

require_once __DIR__ .'/inc/codestar/codestar.php'; 

require_once __DIR__ . '/core/Loader.php';

require_once __DIR__ . '/lib/helper/helper.php';
require_once __DIR__ . '/lib/exceptions';

use hedao\core\Loader;
use hedao\lib\metaBox\MetaBoxCommon;
use hedao\lib\metaBox\MetaBoxOutsideThumbnail;
use hedao\lib\support\SupportViewCount;
use hedao\lib\support\SupportCustomMenu;



Loader::run();


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
  }


}


