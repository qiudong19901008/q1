<?php

namespace hedao\lib\taxonomy;

use \CSF;
use hedao\lib\constant\MetaBoxOptions;
use hedao\core\TSingleton;
use hedao\lib\constant\TaxonomyOptions;

use function hedao\lib\getHeDaoMetaBoxOption;


class TaxonomyTdk{

  use TSingleton;

  private $_taxonomyTypeArr;

  /**
   * @param array $params [taxonomyTypeArr=(post_tag|category)[]]
   */
  protected function __construct($params)
  {
    $this->_taxonomyTypeArr= $params['taxonomyTypeArr'];
    $this->init();
  }



  public function init(){

    CSF::createTaxonomyOptions(TaxonomyOptions::HEDAO_TDK_PREFIX, array(
      // 'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> TDK设置 </span> ',
      'taxonomy'  => $this->_taxonomyTypeArr,
      'data_type' => 'unserialize', // The type of the database save options. `serialize` or `unserialize`
    ));

    CSF::createSection(TaxonomyOptions::HEDAO_TDK_PREFIX, array(
      'fields' => [
          // 标题
          array(
            'id'          => TaxonomyOptions::HEDAO_TDK_TITLE,
            'type'        => 'text',
            'title'       => '标题',
            'default'     => '',
            'attributes'  => array(
              'style'     => 'width: 100%;'
            ),
          ),
          // 关键词
          array(
            'id'          => TaxonomyOptions::HEDAO_TDK_KEYWORDS,
            'type'        => 'text',
            'title'       => '关键词',
            'default'     => '',
            'attributes'  => array(
              'style'     => 'width: 100%;'
            ),
          ),
          // 描述
          array(
            'id'          => TaxonomyOptions::HEDAO_TDK_DESCRIPTION,
            'type'        => 'textarea',
            'title'       => '描述',
            'default'     => '',
          ),
      ]
    ));

  }
}






