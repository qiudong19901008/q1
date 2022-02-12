<?php

namespace hedao\lib\helper;

use hedao\constant\Options;
use hedao\constant\MetaBoxOptions;

/**
 * @description 获取q5的配置项
 * @param string $optionName 选项名称
 * @param string $default 
 */
function getHeDaoOption($optionName,$default=''){
  $options = get_option( Options::HEDAO_OPTION_PREFIX );
  return empty($options[$optionName]) ? $default:$options[$optionName];
}


function getHeDaoMetaBoxOption($optionName,$default='',$single=true){
  $res = get_post_meta(get_the_ID(),$optionName,$single);
  if(empty($res)){
    $res = $default;
  }
  return $res;
}

function getHeDaoMetaBoxCommonKeywordsOption(){
  return getHeDaoMetaBoxOption(MetaBoxOptions::HEDAO_COMMON_KEYWORDS);
}

function getHeDaoMetaBoxCommonDescriptionOption(){
  return getHeDaoMetaBoxOption(MetaBoxOptions::HEDAO_COMMON_DESCRIPTION); 
}

function getHeDaoMetaBoxCommonViewCountOption(){
  return getHeDaoMetaBoxOption(MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT); 
}

function getHeDaoOutsideThumbnailMetaBoxOption(){
  $isOpen = getHeDaoMetaBoxOption(MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_OPEN);
  if(!$isOpen){
    return '';
  }
  return getHeDaoMetaBoxOption(MetaBoxOptions::HEDAO_OUTSIDE_THUMBNAIL_URL);
}










