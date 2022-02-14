<?php

namespace hedao\lib\metaBox;

use \CSF;
use hedao\lib\constant\MetaBoxOptions;
use hedao\core\TSingleton;

use function hedao\lib\getHeDaoMetaBoxOption;


class MetaBoxCommon{

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

    CSF::createMetabox(MetaBoxOptions::HEDAO_COMMON_PREFIX, array(
      'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> 通用属性 </span> ',
      'post_type' => $this->_postTypeArr,
      'data_type' => 'unserialize',
      // 'context' => 'side',
    ));

    CSF::createSection(MetaBoxOptions::HEDAO_COMMON_PREFIX, array(
      'fields' => [
          // 关键词
          array(
            'id'          => MetaBoxOptions::HEDAO_COMMON_KEYWORDS,
            'type'        => 'text',
            'title'       => '关键词',
            'default'     => '',
            'attributes'  => array(
              'style'     => 'width: 100%;'
            ),
          ),
          // 描述
          array(
            'id'          => MetaBoxOptions::HEDAO_COMMON_DESCRIPTION,
            'type'        => 'textarea',
            'title'       => '描述',
            'default'     => '',
          ),
          // 浏览量
          array(
            'id'          => MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT,
            'type'        => 'number',
            'title'       => '浏览量',
            'default'     => '0',
          ),
      ]
    ));

  }
}






