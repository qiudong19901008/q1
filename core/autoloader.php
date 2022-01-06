<?php


namespace hedao;


class Autoloader{

	public static function run($resource,$themeTypeArr){

		//资源路径不存在
		if(empty($resource)){
			return;
		}
		//资源路径分隔符不正确
		if(strpos( $resource, '\\' ) === false ){
			return;
		}
		$themeType = Autoloader::getThemeType($resource,$themeTypeArr);
		//路径初始位置找不到主题类型
		if($themeType === ''){
			return;
		}

		$pathChipArr = Autoloader::getPathChipArr($resource,$themeType);

		$resourcePath = Autoloader::getResourcePath($pathChipArr,$themeType);
		//没找到路径
		if($resourcePath === ''){
			return;
		}
		
		$isOk = Autoloader::isResourceValid($resourcePath);
		//路径文件不对
		if(!$isOk){
			return;
		}
		require_once( $resourcePath );	
	}

	public static function getThemeType($resource,$themeTypeArr){
		$res = '';
		foreach($themeTypeArr as $themeType){
			//如果该主题类型位于路径的初始位置
			if(strpos( $resource, $themeType ) === 0){
				$res = $themeType;
				break;
			}
		}
		return $res;
	}

	public static function getPathChipArr($resource,$themeType){
		//移除namespace根路径
		$resource = str_replace( $themeType.'\\', '', $resource );
		// 把剩余路径根据 \\ 进行分割
		$pathChipArr = explode( '\\',	$resource );
		return $pathChipArr;
	}

	public static function getResourcePath($pathChipArr,$themeType){
		$res = '';
		// 路径不正确 
		if ( empty( $pathChipArr[0] ) || empty( $pathChipArr[1] ) ) {
			return '';
		}
		// echo 
		// helper文件夹比较特殊
		if($pathChipArr[0] === 'helper'){
			echo $pathChipArr[0];
			$res = sprintf( '%s/%s/%s/%s.php', HEDAO_DIR_PATH, $themeType, $pathChipArr[0], 'helper' );
		}else{
			// <主题根路径>/<主题文件夹>/<主题功能文件夹>/classname;
			$res = sprintf( '%s/%s/%s/%s.php', HEDAO_DIR_PATH, $themeType, $pathChipArr[0], $pathChipArr[1] );
		}
			// q1/helper/helper.php
		
		
		return $res;
	}

	public static function isResourceValid($resourcePath){
		// 文件不存在
		if(!file_exists( $resourcePath )){
			return false;
		}
		$fileStatus = validate_file( $resourcePath );
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
function autoloader($resource){
	Autoloader::run($resource,THEME_TYPE_ARR);
}


spl_autoload_register( '\hedao\autoloader' ); 
