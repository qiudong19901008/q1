<?php

namespace hedao;

use hedao\core\TSingleton;
use hedao\api\v1\TokenRouter;
use hedao\lib\metaBox\MetaBoxCommon;
use hedao\lib\metaBox\MetaBoxOutsideThumbnail;
use hedao\lib\support\SupportCustomMenu;
use hedao\lib\support\SupportViewCount;

use function hedao\lib\helper\hideAdminBar;
use function hedao\lib\helper\openThumbnail;


class Hedao{


  public static function init(){
    self::defineContants();
    self::loadFiles();
  }



  public static function defineContants(){
    define('THEME_LOCAL_PATH',get_template_directory());
    define('THEME_HTTP_PATH',get_template_directory_uri());
  }

  public static function loadFiles(){
    require_once __DIR__ . '/core/BaseLoader.php'; //必须先加载自动加载的父类
    require_once __DIR__ .'/HedaoLoader.php'; //hedao自动加载
    require_once __DIR__ .'/lib/codestar/codestar.php'; //codestar框架
    require_once __DIR__ .'/config/config.php'; //全局配置
    require_once __DIR__ .'/lib/helper/helper.php'; //帮助函数
    require_once __DIR__ .'/lib/exceptions.php'; //异常
  }

  public static function basic($postTypeArr= ['page','post']){
      hideAdminBar();
      openThumbnail();

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

      //注册api
      TokenRouter::getInstance();
  }

}

