<?php


namespace hedao;

require_once __DIR__ .'/codestar-framework/codestar-framework.php'; 

require_once __DIR__ . '/core/Loader.php';

require_once __DIR__ . '/lib/helper/helper.php';

use hedao\core\Loader;
use hedao\metaBox\MetaBoxCommon;
use hedao\metaBox\MetaBoxOutsideThumbnail;
use hedao\support\SupportViewCount;




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
  }


}


