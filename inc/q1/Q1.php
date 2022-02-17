<?php

namespace q1;
use hedao\core\TSingleton;
use hedao\Hedao;
use hedao\lib\metaBox\MetaBoxDownload;
use hedao\lib\support\SupportModifyExcerptEnding;
use q1\core\Menu;
use q1\core\register\Assets;
use q1\core\Widget;

use function hedao\lib\helper\disableGutenbergEditor;

class Q1{

  public static function init(){
    self::defineContants();
    self::loadFiles();

    Hedao::basic(['page','post']);
    SupportModifyExcerptEnding::getInstance([
      'ending'=>'...'
    ]);

    disableGutenbergEditor();

    Assets::getInstance();
    Widget::getInstance();
    Menu::getInstance();

  }



  public static function defineContants(){
    define('Q1_VERSION','1.0');
  }

  public static function loadFiles(){
    require_once __DIR__ .'/Q1Loader.php'; //Q1自动加载
    require_once __DIR__ .'/config/config.php'; //全局配置
    require_once __DIR__ .'/config/adminOptions.php'; //后台设置
    require_once __DIR__ .'/lib/helper.php'; //帮助函数
    require_once __DIR__ .'/lib/exceptions.php'; //异常
  }

}