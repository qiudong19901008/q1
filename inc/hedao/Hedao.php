<?php

namespace hedao;

use hedao\api\v1\TokenRouter;
use hedao\lib\metaBox\MetaBoxCommon;
use hedao\lib\metaBox\MetaBoxOutsideThumbnail;
use hedao\lib\support\SupportCustomMenu;
use hedao\lib\support\SupportViewCount;



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

  //注册合道api
  public static function registeHedaoV1Api(){
    TokenRouter::getInstance();
  }

}