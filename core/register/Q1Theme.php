<?php


namespace q1\core\register;

use hedao\lib\register\CustomCodeSupport;
use hedao\lib\register\ViewCountSupport;
use hedao\lib\traits\TSingleton;

use q1\core\constant\Fields;
use q1\core\constant\Options;

use function q1\core\helper\getQ1Option;

require_once Q1_DIR_PATH . '/core/helper/helper.php';
require_once Q1_DIR_PATH . '/config/config.php';

class Q1Theme{

  use TSingleton;

  protected function __construct(){

    $this->_loadBackendFramework();

    

    //文章元数据自定义盒子[descriptionFieldName,keywordsFieldName,typeArr=('post'|'page')[]]
    PostMetaCustomBox::getInstance([
      'descriptionFieldName'=>Fields::Q1_FIELD_POST_DESCRIPTION,
      'keywordsFieldName'=>Fields::Q1_FIELD_POST_KEYWORDS,
      'typeArr'=>['post'],
    ]); 

    //浏览量支持 [viewCountFieldName:string,postTypeArr:('post'|'page')[]]
    ViewCountSupport::getInstance([
      'viewCountFieldName' => Fields::Q1_FIELD_POST_VIEW_COUNT,
    ]);

    //自定义代码支持 [headerCustomCode:string,footerCustomCode:string]
    CustomCodeSupport::getInstance(([
      'headerCustomCode' => getQ1Option(Options::Q1_OPTION_GLOBAL_HEADER_CUSTOM_CODE),
      'footerCustomCode' => getQ1Option(Options::Q1_OPTION_GLOBAL_FOOTER_CUSTOM_CODE),
    ]));


    Assets::getInstance();
    Widget::getInstance();
    Menu::getInstance();
    Ajax::getInstance();
    Api::getInstance();

    $this->setupHook();
  }

  protected function setupHook(){



    //支持文章缩略图
    add_theme_support('post-thumbnails');

    //禁用古腾堡编辑器
    // disable for posts
    add_filter('use_block_editor_for_post', '__return_false', 10);
    // disable for post types
    add_filter('use_block_editor_for_post_type', '__return_false', 10);
    // Disables the block editor from managing widgets.
    add_filter( 'use_widgets_block_editor', '__return_false' );

    // 修改excerpt结尾
    add_filter('excerpt_more', [$this,'modifyExcerptEnding']);

    // 加载后台框架
    // require_once Q1_DIR_PATH .'/inc/codestar-framework/codestar-framework.php';
    

  }

  // 修改excerpt结尾
  public function modifyExcerptEnding($more) {
    return '...';
  }
  public function _loadBackendFramework(){
    require_once Q1_DIR_PATH .'/inc/codestar-framework/codestar-framework.php';
    require_once Q1_DIR_PATH .'/core/setting/setting.php';
  }






}
