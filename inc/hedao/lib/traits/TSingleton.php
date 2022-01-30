<?php

namespace hedao\lib\traits;

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
      // if(count($params) !== 0){
      //   $instanceList[$calledClass] = new $calledClass($params);
      // }else{
      //   $instanceList[$calledClass] = new $calledClass();
      // }
      $instanceList[$calledClass] = new $calledClass($params);
      do_action(sprintf('hedao_theme_sington_init_%s',$calledClass));
    }
    
    return $instanceList[$calledClass];
  }
}