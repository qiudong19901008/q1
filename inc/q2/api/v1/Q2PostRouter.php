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

use function hedao\lib\helper\getGETValue;
use function hedao\lib\helper\getPOSTValue;


class Q2PostRouter extends BaseRouter{

  use TSingleton;

  protected function __construct()
  { 
    $this->init();
  }

  protected function init(){
    add_action( 'rest_api_init', function () {
      //添加一篇文章
      register_rest_route( 'q2/v1', '/post/add', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'addOneRouter'],
      ]);
      //更新一篇文章 (?P<id>\d+)
      register_rest_route( 'q2/v1', '/post/update/(?P<id>\d+)', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'updateOneRouter'],
      ]);
      //查询文章列表
      register_rest_route( 'q2/v1', '/post/list', [
        'methods' => 'GET',
        'callback' => [$this,'queryListRouter']
      ]);
       //删除一篇文章
      register_rest_route( 'q2/v1', '/post/delete', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'deleteOneRouter']
      ]);
      //删除多篇文章
      register_rest_route( 'q2/v1', '/post/deleteList', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'deleteManyRouter']
      ]);
    });
  }


  /**
   * 1. 获取数据
   * 2. 检验数据
   * 3. 新增
   */
  public function addOneRouter($request){
    // \WP_REST_Server::get_raw_data();
    //1. 
    $uid = $request->get_header('uid');
    //必填
    $title = getPOSTValue('title');
    $categoryIdList = getPOSTValue('categoryIdList');
    //可选
    $content = getPOSTValue('content','');
    $status = getPOSTValue('status','publish');
    $tagIdList = getPOSTValue('tagIdList');
    $create_time = getPOSTValue('create_time');
    $id = getPOSTValue('id');
    //附加
    $thumbnail = getPOSTValue('thumbnail'); //必填

    $downloadUrl = getPOSTValue('downloadUrl','');
    $downloadPassword = getPOSTValue('downloadPassword','');
    $unpackPassword = getPOSTValue('unpackPassword','');

    $keywords = getPOSTValue('keywords');
    $description = getPOSTValue('description');
    
    $metaList = [
      MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_URL=>$thumbnail,

      MetaBoxOptions::HEDAO_COMMON_KEYWORDS=>$keywords,
      MetaBoxOptions::HEDAO_COMMON_DESCRIPTION=>$description,

      MetaBoxOptions::HEDAO_DOWNLOAD_URL=>$downloadUrl,
      MetaBoxOptions::HEDAO_DOWNLOAD_PASSWORD=>$downloadPassword,
      MetaBoxOptions::HEDAO_DOWNLOAD_UNPACK_PASSWORD=>$unpackPassword,
    ];

    //2. 
    if(!$title){
      return new InsertPostFailed('必须传入文章标题!');
    }
    if(!$thumbnail){
      return new InsertPostFailed('必须传入封面图!');
    }
    if(!$categoryIdList || count($categoryIdList) === 0){
      return new InsertPostFailed('必须传入分类id!');
    }

    //3.
    $postId = PostDao::addOnePost(
      $id,
      $title,
      $content,
      $uid,
      $categoryIdList,
      $tagIdList,
      $metaList,
      $status,
      $create_time
    );
    if($postId == 0){
      return new InsertPostFailed();
    }
    return [
      'id'=>$postId
    ];
  }



  public function updateOneRouter($request){
    
    // 如果没id则会找不到路由, 所以不必验证id
    $id = (int)$request['id'];
    $uid = $request->get_header('uid');
    //1.
    $title = getPOSTValue('title');
    $content = getPOSTValue('content','');
    $status = getPOSTValue('status','publish');
    $tagIdList = getPOSTValue('tagIdList');
    $categoryIdList = getPOSTValue('categoryIdList');
    
    $downloadUrl = getPOSTValue('downloadUrl','');
    $downloadPassword = getPOSTValue('downloadPassword','');
    $unpackPassword = getPOSTValue('unpackPassword','');

    $thumbnail = getPOSTValue('thumbnail'); 

    $keywords = getPOSTValue('keywords');
    $description = getPOSTValue('description');
    
    $metaList = [
      MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_URL=>$thumbnail,

      MetaBoxOptions::HEDAO_COMMON_KEYWORDS=>$keywords,
      MetaBoxOptions::HEDAO_COMMON_DESCRIPTION=>$description,

      MetaBoxOptions::HEDAO_DOWNLOAD_URL=>$downloadUrl,
      MetaBoxOptions::HEDAO_DOWNLOAD_PASSWORD=>$downloadPassword,
      MetaBoxOptions::HEDAO_DOWNLOAD_UNPACK_PASSWORD=>$unpackPassword,
    ];
    $postId = PostDao::updateOnePost(
      $id,
      $title,
      $content,
      $uid,
      $categoryIdList,
      $tagIdList,
      $metaList,
      $status
    );
    if($postId == 0){
      return new UpdatePostFailed();
    }
    return [
      'id'=>$postId,
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