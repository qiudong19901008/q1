<?php

namespace hedao\lib\register;

use hedao\lib\traits\TSingleton;

class CustomCodeSupport{

  use TSingleton;

  private $_headerCustomCode;
  private $_footerCustomCode;

  /**
   * @param array $params [headerCustomCode:string,footerCustomCode:string]
   */
  protected function __construct($params)
  {
    $this->_headerCustomCode = $params['headerCustomCode'];
    $this->_footerCustomCode = $params['footerCustomCode'];
    $this->setupHook();
  }

  protected function setupHook(){
    //1. 显示页头
    add_action('wp_head', [$this,'showHeaderCustomCode'] );
    add_action('wp_footer', [$this,'showFooterCustomCode'] );
  }

  public function showHeaderCustomCode(){
    echo $this->_headerCustomCode;
  }

  public function showFooterCustomCode(){
    echo $this->_footerCustomCode;
  }

}

