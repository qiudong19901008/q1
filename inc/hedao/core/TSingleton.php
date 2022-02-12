<?php

namespace hedao\core;

trait TSingleton{
  public function __construct(){

  }

  public function __clone(){

  }

   /**
   * @param array $params 参数
   */
  final public static function getInstance($params=[]){
    static $instanceList = [];
    $calledClass = get_called_class();
    if(!isset($instanceList[$calledClass])){
      $instanceList[$calledClass] = new $calledClass($params);
      do_action(sprintf('hedao_theme_sington_init_%s',$calledClass));
    }
    
    return $instanceList[$calledClass];
  }
}