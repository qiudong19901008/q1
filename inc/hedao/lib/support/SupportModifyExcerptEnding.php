<?php

namespace hedao\lib\support;

use hedao\core\TSingleton;

/**
 * 文章的excerpt修改不同结尾
 */
class SupportModifyExcerptEnding{

  use TSingleton;

  /**
   * 支持的文章类型
   */
  private $_ending;

  /**
   * @param array $params [ending:string]
   */
  protected function __construct($params=['...'])
  {
    $this->_ending = $params['ending'];
    $this->setupHook();
  }

  protected function setupHook(){
    //1. 更新浏览量
    add_filter('excerpt_more', [$this,'modifyExcerptEnding']);
  }

  public function modifyExcerptEnding(){
    return $this->_ending;
  }

}

