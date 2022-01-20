<?php


namespace q1;

require_once __DIR__ . '/helper/helper.php';
require_once __DIR__ . '/setting/setting.php';

class Autoload{

	// core/constant
	public static function run($resource){
		//q1\core\<dir>\classname q1\config\config.php
		$resource = str_replace( 'q1\\', '', $resource );
		$pathChipArr = explode( '\\',	$resource ); // <core|config> + dir + classname
		
		$fp='';

		switch($pathChipArr[0]){
			case 'config':
				$fp = sprintf( Q1_DIR_PATH . '/config/config.php');
				break;
			case 'core':
				$fp = sprintf( __DIR__ . '/%s/%s.php',$pathChipArr[1],$pathChipArr[2] );
				break;
		}
		
		if(!self::_isCollectPath($fp)){
			return;
		}
		require_once( $fp );
	}

	private static function _isCollectPath($fp){
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

/**
 * @description 自动加载类函数
 * @resource 完全限定名的命名空间文件路径
 */
function autoload($resource){
	Autoload::run($resource);
}


spl_autoload_register( '\q1\autoload' ); 
