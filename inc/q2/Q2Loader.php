<?php

namespace q2;

use hedao\core\BaseLoader;

use function hedao\lib\helper\console;

class Q2Loader extends BaseLoader{



  protected function getRootDir()
  {
    return __DIR__;
  }

  protected function getFilePath($resource)
  {
    $resource = str_replace( 'q2\\', '', $resource );
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
      case 'lib':
        $fp = $this->_getLibFilePath($pathChipArr[1],@$pathChipArr[2]);
        break;
    }
    return $fp;
  }

  private function _getApiClassPath($version,$classname){
    // /api/v1/class.php

    $res = sprintf( $this->getRootDir() . '/api/%s/%s.php', $version,$classname);
    // console($res);
    return $res;
  }

  private function _getCoreClassPath($classname){
    // /core/class.php
    return sprintf( $this->getRootDir() . '/core/%s.php',$classname);
  }

  private function _getServiceClassPath($classname){
    // /core/class.php
    return sprintf( $this->getRootDir() . '/service/%s.php',$classname);
  }

  private function _getLibFilePath($firstFloor,$secondFloor){
    $res = '';
    switch($firstFloor){ 
      case 'constant':
        // /lib/constant/class.php
        $res = sprintf( $this->getRootDir() . '/lib/constant/%s.php',$secondFloor);
        break;
      case 'widget':
        // /lib/widget/class.php
        $res = sprintf( $this->getRootDir() . '/lib/widget/%s.php',$secondFloor);
        break;
    }
    return $res;
  }

}


function autoload($resource){
  $loader = Q2Loader::getInstance();
  $loader->load($resource);
}


spl_autoload_register( '\q2\autoload' ); 