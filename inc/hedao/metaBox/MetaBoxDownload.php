<?php

namespace hedao\metaBox;

use \CSF;
use hedao\constant\MetaBoxOptions;
use hedao\core\TSingleton;

use function hedao\lib\getHeDaoMetaBoxOption;


class MetaBoxDownload{

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

    CSF::createMetabox(MetaBoxOptions::HEDAO_DOWNLOAD_PREFIX, array(
      'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> 下载属性 </span> ',
      'post_type' => $this->_postTypeArr,
      'data_type' => 'unserialize',
      // 'context' => 'side',
    ));

    CSF::createSection(MetaBoxOptions::HEDAO_DOWNLOAD_PREFIX, array(
      'fields' => [
          // 下载链接
          array(
            'id'          => MetaBoxOptions::HEDAO_DOWNLOAD_URL,
            'type'        => 'text',
            'title'       => '下载链接',
            'default'     => '',
            'attributes'  => array(
              'style'     => 'width: 100%;'
            ),
          ),
          // 提取码
          array(
            'id'          => MetaBoxOptions::HEDAO_DOWNLOAD_PASSWORD,
            'type'        => 'text',
            'title'       => '提取码',
            'default'     => '',
            'attributes'  => array(
              'style'     => 'width: 100px;'
            ),
          ),
          // 解压码
          array(
            'id'          => MetaBoxOptions::HEDAO_DOWNLOAD_UNPACK_PASSWORD,
            'type'        => 'text',
            'title'       => '解压码',
            'default'     => '',
          ),
      ]
    ));

  }
}






