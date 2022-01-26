<?php


namespace hedao;

require_once __DIR__ . '/lib/helper/helper.php';

class Autoload{

	public static function run($resource){

		$resource = str_replace( 'hedao\\', '', $resource );
		$pathChipArr = explode( '\\',	$resource );
		$fp = '';
		switch($pathChipArr[0]){
			case 'lib':
				$fp = self::_getLibDirFilePath($pathChipArr[1],$pathChipArr[2]);
				break;
			case 'dao':
				$fp = self::_getDaoPath($pathChipArr[1]);
				break;
		}
		if(!self::_isCollectPath($fp)){
			return;
		}
		require_once( $fp );			
	}

	private static function _getLibDirFilePath($classDir,$classname){
		$res = '';
		switch($classDir){
			case 'helper':
				$res = self::_getHelperDirFilePath($classname);
				break;
			case 'traits':
				$res = self::_getTraitsDirFilePath($classname);
				break;
		}
		return $res;
	}

	private static function _getHelperDirFilePath($classname){
		// hedao\lib\helper\classname.php
		return sprintf( __DIR__ . '/lib/helper/%s.php',$classname );
	}

	private static function _getTraitsDirFilePath($classname){
		// hedao\lib\traits\classname.php
		return sprintf( __DIR__ . '/lib/traits/%s.php',$classname );
	}

	private static function _getDaoPath($classname){		
		// hedao/dao/classname/classname.php;
		return sprintf( __DIR__ . '/dao/%s/%s.php', $classname, $classname);
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


spl_autoload_register( '\hedao\autoload' ); 