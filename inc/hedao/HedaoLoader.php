<?php

namespace hedao;

use hedao\core\BaseLoader;

use function hedao\lib\helper\console;

class HedaoLoader extends BaseLoader{

  protected function getRootDir()
  {
    return __DIR__;
  }

  protected function getFilePath($resource)
  {
    $resource = str_replace( 'hedao\\', '', $resource );
		$pathChipArr = explode( '\\',	$resource );
		$fp = '';
    switch($pathChipArr[0]){
      case 'api':
        $fp = $this->_getApiClassPath($pathChipArr[1],$pathChipArr[2]);
        break;
      case 'core':
        $fp = $this->_getCoreClassPath($pathChipArr[1]);
        break;
      case 'service':
        $fp = $this->_getServiceClassPath($pathChipArr[1]);
        break;
      case 'dao':
        $fp = $this->_getDaoClassPath($pathChipArr[1]);
        break;
      case 'lib':
        $fp = $this->_getLibFilePath($pathChipArr[1],@$pathChipArr[2]);
        break;
    }
    return $fp;
  }

  private function _getApiClassPath($version,$classname){
    // /api/v1/class.php
    return sprintf( $this->getRootDir() . '/api/%s/%s.php', $version,$classname);
  }

  private function _getCoreClassPath($classname){
    // /core/class.php
    return sprintf( $this->getRootDir() . '/core/%s.php',$classname);
  }

  private function _getServiceClassPath($classname){
    // /service/classname/classname.php
    return sprintf( $this->getRootDir() . '/service/%s/%s.php',$classname,$classname);
  }

  private function _getDaoClassPath($classname){
    // /dao/classname/classname.php
    return sprintf( $this->getRootDir() . '/dao/%s/%s.php',$classname,$classname);
  }

  private function _getLibFilePath($firstFloor,$secondFloor){
    $res = '';
    switch($firstFloor){ 
      case 'constant':
        // /lib/constant/class.php
        $res = sprintf( $this->getRootDir() . '/lib/constant/%s.php',$secondFloor);
        break;
      case 'metaBox':
        // /lib/metaBox/class.php
        $res = sprintf( $this->getRootDir() . '/lib/metaBox/%s.php',$secondFloor);
        break;
      case 'support':
        // /lib/support/class.php
        $res = sprintf( $this->getRootDir() . '/lib/support/%s.php',$secondFloor);
        break;
      default:
        // /lib/class.php
        $res = sprintf( $this->getRootDir() . '/lib/%s.php',$firstFloor);
        // console($res);
    }
    return $res;
  }

}

function autoload($resource){
  $loader = HedaoLoader::getInstance();
  $loader->load($resource);
}


spl_autoload_register( '\hedao\autoload' ); 