<?php

namespace q2\api\v1;

use hedao\core\BaseRouter;
use hedao\core\TSingleton;
use hedao\dao\PostDao;
use hedao\lib\constant\MetaBoxOptions;
use hedao\lib\GetMenuData;
use q2\lib\constant\Constants;
use q2\lib\constant\Options;



class Q2PageRouter extends BaseRouter{

  use TSingleton;

  protected function __construct()
  { 
    $this->init();
  }

  protected function init(){
    add_action( 'rest_api_init', function () {
      //拉取首页
      register_rest_route( 'q2/v1', '/page/home', [
        'methods' => 'GET',
        // 'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'getHomeRouter'],
      ]);
    });
  }

  /**
   * 获取首页
   * 1. 轮播图
   * 2. 通知
   * 3. 菜单
   * 4. 最新文章
   */
  public function getHomeRouter(){
    //1.
    $carousel = getQ2Option(Options::Q2_HOME_BASIC_CAROUSEL);
    //2. 
    $notice = getQ2Option(Options::Q2_HOME_BASIC_NOTICE);
    //3. 
    $homeMenu = GetMenuData::run(Constants::HOME_MENU);
    //4. 
    $listAndCount = PostDao::queryPostList(
      [],
      [],
      [],
      ['postType'=>'post'],
      null,
      ['publish'],
      'create_time',
      'DESC',
      1,
      10,
      ['category','tag','meta'],
      [
        MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_URL,

        MetaBoxOptions::HEDAO_DOWNLOAD_URL,
        MetaBoxOptions::HEDAO_DOWNLOAD_PASSWORD,
        MetaBoxOptions::HEDAO_DOWNLOAD_UNPACK_PASSWORD,
      ]
    );

    return [
      'carousel' => $carousel,
      'notice' => $notice,
      'homeMenu' => $homeMenu,
      'list' => $listAndCount['list'],
      'count' => $listAndCount['count'],
    ];

  }






}