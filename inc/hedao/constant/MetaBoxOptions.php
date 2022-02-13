<?php 

namespace hedao\constant;

class MetaBoxOptions{
 
  

  ///////////////外链缩略图/////////////
  /**
   * 合道-外链缩略图配置前缀
   */
  public const HEDAO_OUTSIDE_THUMBNAIL_PREFIX = '_hedao_outside_thumbnail_post_meta_option_prefix';
  /**
   * 合道-开启外链缩略图
   */
  public const HEDAO_OUTSIDE_THUMBNAIL_OPEN = '_hedao_post_meta_open_outside_thumbnail';
  /**
   * 合道-外链缩略图链接
   */
  public const HEDAO_OUTSIDE_THUMBNAIL_URL = '_hedao_post_meta_outside_thumbnail_url';

  ///////////////通用属性: 关键词, 描述, 浏览量/////////////

  /**
   * 合道-通用配置前缀
   */
  public const HEDAO_COMMON_PREFIX = '_hedao_common_post_meta_option_prefix';
  /**
   * 合道-关键词
   */
  public const HEDAO_COMMON_KEYWORDS = '_hedao_post_meta_keywords';
  /**
   * 合道-描述
   */
  public const HEDAO_COMMON_DESCRIPTION = '_hedao_post_meta_description';
  /**
   * 合道-浏览量
   */
  public const HEDAO_COMMON_VIEW_COUNT= '_hedao_post_meta_view_count';

  ///////////////下载属性: 链接,提取码,解压码/////////////
  /**
   * 合道-通用配置前缀
   */
  public const HEDAO_DOWNLOAD_PREFIX = '_hedao_download_post_meta_option_prefix';
  /**
   * 合道-下载链接
   */
  public const HEDAO_DOWNLOAD_URL = '_hedao_post_meta_downloadUrl';
  /**
   * 合道-提取码
   */
  public const HEDAO_DOWNLOAD_PASSWORD = '_hedao_post_meta_downloadPassword';
  /**
   * 合道-解压码
   */
  public const HEDAO_DOWNLOAD_UNPACK_PASSWORD= '_hedao_post_meta_unpackPassword';

}