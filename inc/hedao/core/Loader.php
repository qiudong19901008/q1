<?php


namespace hedao\core;


class Loader{
	public static function run(){
		spl_autoload_register( '\hedao\core\loader' );
	}
}

/**
 * @description 自动加载类函数
 * @resource 完全限定名的命名空间文件路径
 */
function loader($resource){
	RealLoader::run($resource);
}


class RealLoader{

	public static function _getRootDir(){
		return dirname(__DIR__);
	}

	public static function run($resource){

		$resource = str_replace( 'hedao\\', '', $resource );
		$pathChipArr = explode( '\\',	$resource );
		$fp = '';
		
		switch($pathChipArr[0]){
			case 'lib':
				$fp = self::_getLibPath($pathChipArr[1]);
				break;
			case 'dao':
				$fp = self::_getDaoPath($pathChipArr[1]);
				break;
			case 'constant':
				$fp = self::_getConstantPath($pathChipArr[1]);
				break;
			case 'core':
				$fp = self::_getCorePath($pathChipArr[1]);
				break;
			case 'metaBox':
				$fp = self::_getMetaBoxPath($pathChipArr[1]);
				break;
			case 'support':
				$fp = self::_getSupportPath($pathChipArr[1]);
				break;
		}
		if(!self::_isCollectPath($fp)){
			return;
		}
		require_once( $fp );			
	}

	// private static function _getLibDirFilePath($classDir,$classname){
	// 	$res = '';
	// 	if($classDir == 'helper'){
	// 		$res = self::_getHelperDirFilePath($classname);
	// 	}else{

	// 	}
	
	// 	return $res;
	// }

	private static function _getLibPath($classname){
		// hedao\lib\classname.php
		return sprintf( self::_getRootDir() . '/lib/%s.php',$classname );
	}

	private static function _getDaoPath($classname){		
		// hedao/dao/classname/classname.php;
		return sprintf( self::_getRootDir() . '/dao/%s/%s.php', $classname, $classname);
	}

	private static function _getConstantPath($classname){		
		// hedao/constant/classname.php;
		return sprintf( self::_getRootDir() . '/constant/%s.php', $classname);
	}

	private static function _getCorePath($classname){
		// hedao/core/classname.php;
		return sprintf( self::_getRootDir() . '/core/%s.php', $classname);
	}

	private static function _getMetaBoxPath($classname){
		// hedao/metaBox/classname.php;
		return sprintf( self::_getRootDir() . '/metaBox/%s.php', $classname);
	}

	private static function _getSupportPath($classname){
		// hedao/support/classname.php;
		return sprintf( self::_getRootDir() . '/support/%s.php', $classname);
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





