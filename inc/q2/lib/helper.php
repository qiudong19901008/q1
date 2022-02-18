<?php

use q2\lib\constant\Options;

/**
 * @description 获取q2的配置项
 * @param string $optionName 选项名称
 * @param string $default 
 */
function getQ2Option($optionName,$default=''){
  $options = get_option( Options::Q2_OPTION_PREFIX );
  return empty($options[$optionName]) ? $default:$options[$optionName]; 
}
