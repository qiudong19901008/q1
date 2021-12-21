<?php

/**
 * 
 * 
 * 
 */

class Fields{

  //---------------------------post额外字段--------------------------------

  /**
   * 文章被赞的数量字段
   */
  public const COUNT_POST_LIKE = 'q1_field_post_like_count';
  /**
   * 文章浏览的次数字段
   */
  public const COUNT_POST_VIEW = 'q1_field_post_view_count';

  /**
   * 文章keyword字段
   */
  public const POST_KEYWORD = '_q1_field_post_seo_keyword';

   /**
   * 文章description
   */
  public const POST_DESCRIPTION = '_q1_field_post_seo_description';


  //---------------------------category额外字段--------------------------------

  /**
   * 文章keyword字段
   */
  public const CATEGORY_KEYWORD = '_q1_field_category_seo_keyword';

   /**
   * 文章description
   */
  public const CATEGORY_DESCRIPTION = '_q1_field_category_seo_description';
  
}


