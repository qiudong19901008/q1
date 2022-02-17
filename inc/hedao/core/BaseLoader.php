<?php
namespace hedao\core;

use hedao\core\TSingleton;

abstract class BaseLoader{


  use TSingleton;
  

  /**
   * 获取根路径
   */
  protected abstract function getRootDir();

  /**
   * 获取文件路径
   * @param string $resource 完全限定名的命名空间文件路径
   */
  protected abstract function getFilePath($resource);

  /**
   * @param string $resource 完全限定名的命名空间文件路径
   */
  public function load($resource){
    $fp = $this->getFilePath($resource);
    if(!$this->isCollectPath($fp)){ 
      return;
    }
    require_once( $fp );
  }

  protected function isCollectPath($fp){
		// 文件不存在
		if(!file_exists( $fp )){
			return false;
		}
		$fileStatus = validate_file( $fp );
		// 文件状态不对
		if(0 !== $fileStatus && 2 !== $fileStatus){
			return false;
		}
		return true;
	}

}