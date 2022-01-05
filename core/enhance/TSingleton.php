<?php

namespace hedao\core\enhance;

trait TSingleton{
  public function __construct(){

  }

  public function __clone(){

  }

  final public static function getInstance(){
    static $instanceList = [];
    $calledClass = get_called_class();
    if(!isset($instanceList[$calledClass])){
      $instanceList[$calledClass] = new $calledClass();
      do_action(sprintf('hedao_theme_sington_init_%s',$calledClass));
    }
    return $instanceList[$calledClass];
  }
}