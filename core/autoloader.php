<?php

/**
 * Autoloader file for theme.
 */

namespace hedao\core;


/**
 * Auto loader function.
 *
 * @param string $resource Source namespace.
 *
 * @return void
 */

function autoloader( $resource = '' ) {
	$resource_path  = false;
	$namespace_root = 'hedao\\';
	$resource       = trim( $resource, '\\' );

  // 如果不是我们的资源路径则退出 Not our namespace, bail out.
	if ( 
      empty( $resource ) //如果资源路径为空
      || strpos( $resource, '\\' ) === false //如果没有找到 \\ 分隔符
      || strpos( $resource, $namespace_root ) !== 0 //如果资源路径没包含 Q1\\
  ) {
		return;
	}

	// Remove our root namespace.
	$resource = str_replace( $namespace_root, '', $resource );

  // 把路径根据 \\ 进行分割
	$path = explode(
		'\\',
		str_replace( '_', '-', strtolower( $resource ) )
	);

	/**
   * 我们的自动加载类是在 Q1\core\autoloader 路径下面, 如果 core和 autoloader路径名不存在 则代表路径有问题, 退出
   * 
	 * Time to determine which type of resource path it is,
	 * so that we can deduce the correct file path for it.
	 */
	if ( empty( $path[0] ) || empty( $path[1] ) ) {
		return;
	}

  //下面进行正确解析

	$directory = '';
	$file_name = '';

	if ( 'core' === $path[0] ) {

		switch ( $path[1] ) {
			case 'enhance':
				$directory = 'enhance';
				$file_name = $path[2];
				break;

			case 'widgets':
			// case 'blocks': // phpcs:ignore PSR2.ControlStructures.SwitchDeclaration.TerminatingComment
			// 	/**
			// 	 * If there is class name provided for specific directory then load that.
			// 	 * otherwise find in inc/ directory.
			// 	 */
			// 	if ( ! empty( $path[2] ) ) {
			// 		$directory = sprintf( 'classes/%s', $path[1] );
			// 		$file_name = sprintf( 'class-%s', trim( strtolower( $path[2] ) ) );
			// 		break;
			// 	}
			default:
				$directory = 'boot';
				$file_name = $path[2];
				break;
		}

		$resource_path = sprintf( '%s/core/%s/%s.php', untrailingslashit( HEDAO_DIR_PATH ), $directory, $file_name );

	}

	/**
	 * If $is_valid_file has 0 means valid path or 2 means the file path contains a Windows drive path.
	 */
	$is_valid_file = validate_file( $resource_path );

	if ( ! empty( $resource_path ) && file_exists( $resource_path ) && ( 0 === $is_valid_file || 2 === $is_valid_file ) ) {
		// We already making sure that file is exists and valid.
		require_once( $resource_path ); // phpcs:ignore
	}

}

spl_autoload_register( '\hedao\core\autoloader' ); 
