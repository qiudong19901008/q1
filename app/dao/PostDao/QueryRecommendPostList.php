<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';

class QueryRecommendPostList extends BasePostDao{

  /**
   * @description 根据like、view、comment降序获取文章
   * @param 'like'|'view'|'comment' $type 显示的文章类型
   * @param number $size 显示的文章数量
   */
  public function run($type,$size){
    $arg = []; //wp_query的参数
    $extendFieldList = [];
    switch($type){
      case 'view':
        $arg = [
          'posts_per_page'	=> $size,
          'meta_key'			=> 'view',
          'orderby'			=> ['meta_value_num'=>'DESC'],
        ];
        $extendFieldList = ['viewCount'];
        break;
      case 'comment':
        $arg = [
          'posts_per_page'	=> $size,
          'orderby'			=> 'comment_count',
          'order'				=> 'DESC',
        ];
        $extendFieldList = ['commentCount'];
        break;
      case 'like':
        $arg = [
          'posts_per_page'	=> $size,
          'meta_key'			=> 'like',
          'orderby'			=> ['meta_value_num'=>'DESC'],
        ];
        $extendFieldList = ['likeCount'];
        break;
    }
    $query = new WP_Query($arg);
    $res = $this->getNeededData($query,['meta'],[
      Fields::COUNT_POST_LIKE,
      Fields::COUNT_POST_VIEW,
    ]);
    wp_reset_query();
    return $res;
  }




}