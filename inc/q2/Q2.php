<?php

namespace q2;
use hedao\core\TSingleton;
use hedao\Hedao;
use hedao\lib\metaBox\MetaBoxDownload;
use hedao\lib\support\SupportModifyExcerptEnding;

use q2\api\v1\Q2PostRouter;


use function hedao\lib\helper\disableGutenbergEditor;

class Q2{

  public static function init(){
    self::defineContants();
    self::loadFiles();

    // Hedao::basic(['page','post']);
    // SupportModifyExcerptEnding::getInstance([
    //   'ending'=>'...'
    // ]);

    // $params [postTypeArr=(post|page)[]]
    MetaBoxDownload::getInstance([
      'postTypeArr'=>['post','page']
    ]);

    // disableGutenbergEditor();

    // Assets::getInstance();
    // Widget::getInstance();
    // Menu::getInstance();

    self::registeRouters();


  }



  public static function defineContants(){
    define('Q2_VERSION','1.0');
  }

  public static function loadFiles(){
    require_once __DIR__ .'/Q2Loader.php'; //Q1自动加载
    require_once __DIR__ .'/config/config.php'; //全局配置
    require_once __DIR__ .'/config/adminOptions.php'; //后台设置
    require_once __DIR__ .'/lib/helper.php'; //帮助函数
    require_once __DIR__ .'/lib/exceptions.php'; //异常
  }

  public static function registeRouters(){
    Q2PostRouter::getInstance();
  }

}