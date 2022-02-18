<?php

namespace q2\api\v1;

use hedao\core\BaseRouter;
use hedao\core\TSingleton;
use hedao\dao\PostDao;
use hedao\lib\constant\MetaBoxOptions;
use hedao\lib\exceptions\DeletePostFailed;
use hedao\lib\exceptions\DeletePostListFailed;
use hedao\lib\exceptions\InsertPostFailed;
use hedao\lib\exceptions\Success;
use hedao\lib\exceptions\UpdatePostFailed;
use hedao\lib\GetMenuData;
use q2\lib\constant\Constants;
use q2\lib\constant\Options;

use function hedao\lib\helper\getGETValue;
use function hedao\lib\helper\getPOSTValue;


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



  


  
  
  /**
   * //1. 查询条件
   * 标题或内容 titleOrContent
   * 分类id categoryId 
   * 标签id tagId 
   * 作者id authorId 
   * 文章状态 status 'publish'|'private'
   * //2. 排序条件
   * 排序条件  orderBy  'create_time'|'update_time'|'comment_count'|'rand'
   * 排序规则 orderRule 'DESC'|'ASC'
   * //3. 分页
   * page size
   */
  public function queryListRouter($request){
    //1. 获取查询条件
    $titleOrContent = getGETValue('titleOrContent');
    $categoryId = getGETValue('categoryId');
    $tagId = getGETValue('tagId');
    $authorId = getGETValue('authorId');
    $status = getGETValue('status',['publish']); //有默认

    $orderBy = getGETValue('orderBy','create_time');//有默认
    $orderRule = getGETValue('orderRule','DESC');//有默认

    $page = getGETValue('page',1);//有默认
    $size = getGETValue('size',10);//有默认
    //2. 消毒
    if($categoryId){
      $categoryIdListIn = [$categoryId];
    }
    if($tagId){
      $tagIdListIn = [$tagId];
    }
    if($authorId){
      $authorIdListIn = [$authorId];
    }
    if($titleOrContent){
      $s = $titleOrContent;
    }
    //3. 
    $listAndCount = PostDao::queryPostList(
      ['categoryIdListIn'=>@$categoryIdListIn],
      ['tagIdListIn'=>@$tagIdListIn],
      ['authorIdListIn'=>@$authorIdListIn],
      ['postType'=>'post'],
      @$s,
      $status,
      $orderBy,
      $orderRule,
      $page,
      $size,
      ['author','category','tag','meta'],
      [
        MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_URL,

        MetaBoxOptions::HEDAO_COMMON_DESCRIPTION,
        MetaBoxOptions::HEDAO_COMMON_KEYWORDS,
        MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT,

        MetaBoxOptions::HEDAO_DOWNLOAD_URL,
        MetaBoxOptions::HEDAO_DOWNLOAD_PASSWORD,
        MetaBoxOptions::HEDAO_DOWNLOAD_UNPACK_PASSWORD,
      ]
    );
    return $listAndCount;
  }

  public function deleteOneRouter($request){
    $id = getPOSTValue('id');
    if(!$id){
      return new DeletePostListFailed('必须传入id');
    }
    $res = PostDao::deleteOnePost($id);
    if($res == 0){
      return new DeletePostFailed();
    }
    return new Success();
  }


  public function deleteManyRouter($request){
    $idArr = getPOSTValue('idArr');
    if(!$idArr || count($idArr) === 0){
      return new DeletePostListFailed('必须传入idArr');
    }
    $res = deletePostListByIdArr($idArr);
    $success = $res['success'];
    $failed = $res['failed'];
    if($failed !== 0){
      return new DeletePostListFailed('删除成功了' . $success .' 篇文章, 删除失败了 '. $failed . ' 篇文章' );
    }
    return new Success();
  }



}