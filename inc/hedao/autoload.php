<?php


namespace hedao;

define('THEME_LOCAL_PATH',get_template_directory());
define('THEME_HTTP_PATH',get_template_directory_uri());

require_once __DIR__ .'/codestar-framework/codestar-framework.php'; 

require_once __DIR__ . '/core/Loader.php';

require_once __DIR__ . '/lib/helper/helper.php';

use hedao\core\Loader;
use hedao\metaBox\MetaBoxCommon;
use hedao\metaBox\MetaBoxOutsideThumbnail;
use hedao\support\SupportViewCount;
use hedao\support\SupportCustomMenu;



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


