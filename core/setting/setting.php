<?php

namespace q1\core\setting{
	use \CSF;
	use q1\core\constant\Options;

	if ( ! class_exists( 'CSF' ) ) {
		return null;
	}

	//选项前缀
	$prefix = Options::Q1_OPTION_PREFIX;

	//主题信息
	$theme = wp_get_theme();

		// include('demoSetting.php');

	//基础设置, 对框架的配置
	include('basicSetting.php');

	//全局设置
	CSF::createSection( $prefix, array(
		'id' => 'global_setting',
		'title'  => '全局设置',
		'icon' => 'fa fa-globe',
		'description' => '全局设置',
	) );

	include('globalSetting.php');

	//首页设置
	CSF::createSection( $prefix, array(
		'id' => 'home_setting',
		'title'  => '首页设置',
		'icon' => 'fa fa-shopping-cart',
	) );

	include('homeSetting.php');

	//文章页设置
	CSF::createSection( $prefix, array(
		'id' => 'post_setting',
		'title'  => '文章页设置',
		'icon' => 'fa fa-file-text',
	) );
	include('postSetting.php');

	//页面设置
	CSF::createSection( $prefix, array(
  'id' => 'page_setting',
  'title'  => '页面设置',
  'icon' => 'fa fa-file-o',
	));
	include('pageSetting.php');

}



namespace q1\core\helper{

	use q1\core\constant\Options;

	/**
 * @description 获取q1的配置项
 * @param string $optionName 选项名称
 * @param mixed  $default 
 */
	function getQ1Option($optionName,$default=''){
		$res = $default;
		$options = get_option( Options::Q1_OPTION_PREFIX );
		if(empty($options[$optionName])){
			return '';
		}
		return $res;
	}

}



