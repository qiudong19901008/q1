<?php


namespace hedao;

require_once __DIR__ . '/lib/helper/helper.php';

class Autoloader{

  // hedao\lib\helper\classname; hedao\lib\traits\classname; hedao\dao\classname\classname;

	public static function run($resource){

		//资源路径不存在
		if(empty($resource)){
			return;
		}
		//资源路径分隔符不正确
		if(strpos( $resource, '\\' ) === false ){
			return;
		}
    //不是以hedao开头
    if(!self::_isHedaoBegin($resource)){
      return;
    }
		$pathChipArr = self::_getPathChipArr($resource);
    //二级目录 lib dao
    switch($pathChipArr[0]){
      // case 'lib':
      //   switch($pathChipArr[1]){

      //   }
      //   break;
      case 'dao':

        break;
      default:
        return;
    }

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

	private static function _isHedaoBegin($resource){
    return strpos( $resource, 'hedao' ) === 0; //hedao的position是否是0
	}

	private static function _getPathChipArr($resource){
		//移除namespace根路径
		$resource = str_replace( 'hedao\\', '', $resource );
		// 把剩余路径根据 \\ 进行分割
		$pathChipArr = explode( '\\',	$resource );
		return $pathChipArr;
	}

  private static function _parseLibDir(){

  }

	private static function _getDaoPath($daoClassName){		
		// <主题根路径>/inc/hedao/dao/classname/classname.php;
		$res = sprintf( '%s/inc/hedao/dao/%s/%s.php', HEDAO_DIR_PATH, $daoClassName,$daoClassName );
		return $res;
	}

  private static function _getTraitPath($traitClassName){
    // <主题根路径>/inc/hedao/lib/traits/traitClassName.php;
    return sprintf( '%s/inc/hedao/lib/traits/%s.php', HEDAO_DIR_PATH,$traitClassName );
  }

  private static function _getHelperPath($helperClassName){
    if(helperClassName)
    // <主题根路径>/inc/hedao/lib/helper/traitClassName.php;
    return sprintf( '%s/inc/hedao/lib/traits/%s.php', HEDAO_DIR_PATH,$traitClassName );
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