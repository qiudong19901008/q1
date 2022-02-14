<?php

namespace hedao\lib\metaBox;
use hedao\lib\constant\MetaBoxOptions;
use hedao\core\TSingleton;
use function hedao\lib\getHeDaoMetaBoxOption;
use \CSF;


//2. 代码片段
class MetaBoxOutsideThumbnail{

  use TSingleton;

  private $_postTypeArr;

  /**
   * @param array $params [postTypeArr=(post|page)[]]
   */
  protected function __construct($params)
  {
    $this->_postTypeArr = $params['postTypeArr'];
    $this->init();
  }

  public function init(){
    CSF::createMetabox(MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_PREFIX, array(
      'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> 外链缩略图 </span> ',
      'post_type' => $this->_postTypeArr,
      'data_type' => 'unserialize',
      // 'context' => 'side',
    ));
  
    CSF::createSection(MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_PREFIX, array(
      'fields' => [
          // 开启外链缩略图
          array(
            'id'=>MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_OPEN,
            'type'  => 'switcher',
            'title' => '开启',
            'desc'  => '',
            'default' => false,
          ),
          // 外链缩略图地址
          array(
            'id'          => MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_URL,
            'type'        => 'text',
            'title'       => '图片Url',
            'default'     => '',
            'attributes'  => array(
              'style'     => 'width: 100%;'
            ),
            'dependency'  => [MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_OPEN, '==', true],
          ),
      ]
    ));
  
  }
  
}

