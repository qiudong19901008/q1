<?php

namespace q1;
use hedao\core\TSingleton;
use hedao\Hedao;
use hedao\lib\metaBox\MetaBoxDownload;
use hedao\lib\metaBox\MetaBoxOutsideThumbnail;

use hedao\lib\support\SupportModifyExcerptEnding;

use hedao\lib\taxonomy\TaxonomyView;
use hedao\lib\taxonomy\TaxonomyOutsideThumbnail;

use q1\api\v1\Q1CommentRouter;
use q1\api\v1\Q1PostRouter;
use q1\core\Menu;
use q1\core\Assets;
use q1\core\Widget;

use function hedao\lib\helper\disableGutenbergEditor;

class Q1{

  public static function init(){
    self::defineContants();
    self::loadFiles();

    Hedao::basic(['page','post'],['category','post_tag']);
    SupportModifyExcerptEnding::getInstance([
      'ending'=>'...'
    ]);

    MetaBoxOutsideThumbnail::getInstance([
      'postTypeArr' => ['page','post'],
    ]);

    TaxonomyOutsideThumbnail::getInstance([
      'taxonomyTypeArr' => ['category','post_tag']
    ]);

    TaxonomyView::getInstance([
      'taxonomyTypeArr' => ['category','post_tag']
    ]);

    disableGutenbergEditor();

    Assets::getInstance();
    Widget::getInstance();
    Menu::getInstance();

    self::registeRouters();


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

  public static function registeRouters(){
    Q1CommentRouter::getInstance();
    Q1PostRouter::getInstance();
  }

}