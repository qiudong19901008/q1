<?php

namespace hedao\lib\taxonomy;
use hedao\lib\constant\TaxonomyOptions;
use hedao\core\TSingleton;
use function hedao\lib\getHeDaoMetaBoxOption;
use \CSF;


//2. 代码片段
class TaxonomyOutsideThumbnail{

  use TSingleton;

  private $_taxonomyTypeArr;

  /**
   * @param array $params [taxonomyTypeArr=(category|post_tag)[]]
   */
  protected function __construct($params)
  {
    $this->_taxonomyTypeArr = $params['taxonomyTypeArr'];
    $this->init();
  }

  public function init(){
    CSF::createTaxonomyOptions(TaxonomyOptions::HEDAO_OUTSIDE_THUMBNAIL_PREFIX, array(
      // 'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> 外链缩略图 </span> ',
      'taxonomy' => $this->_taxonomyTypeArr,
      'data_type' => 'unserialize',
      // 'context' => 'side',
    ));
  
    CSF::createSection(TaxonomyOptions::HEDAO_OUTSIDE_THUMBNAIL_PREFIX, array(
      'fields' => [
          // 外链缩略图地址
          array(
            'id'          => TaxonomyOptions::HEDAO_OUTSIDE_THUMBNAIL_URL,
            'type'        => 'text',
            'title'       => '图片Url',
            'default'     => '',
            'attributes'  => array(
              'style'     => 'width: 100%;'
            ),
          ),
      ]
    ));
  
  }
  
}

