<?php

namespace q1\setting{
	use \CSF;
	use q1\constant\Options;

	if ( ! class_exists( 'CSF' ) ) {
		return null;
	}

	//选项前缀
	$opt_name = Options::Q1_OPTION_PREFIX;

	//主题信息
	$theme = wp_get_theme();

	CSF::createOptions( $opt_name, array(
		'menu_title' => 'Q1主题',
		'menu_slug'  => 'q1theme',
	));

}



namespace q1\helper{

	use q1\constant\Options;

	/**
 * @description 获取q1的配置项
 * @param string $optionName 选项名称
 * @param mix $type 类型 string,number,array,boolean
 */
	function getQ1Option($optionName,$type='string'){
		// $options = get_option( Options::Q1_OPTION_PREFIX );
		// ( isset( $options[$optionName] ) ) ? $options[$optionName] : '';
		// // $option = \Redux::get_option(Options::Q1_OPTION_PREFIX,$optionName);

		// if($option == '' && $type == 'array'){
		// 	$option = [];
		// }
		// return $option;
	}

}



