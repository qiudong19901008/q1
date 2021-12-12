<?php


/**
 * @description 根据like、view、comment降序获取文章
 * @param 'like'|'view'|'comment' $type
 * @param number $size
 * @return Wp_Query
 */
function queryPostDesc($type,$size){

  $arg = []; //wp_query的参数
  switch($type){
    case 'view':
      $arg = [
        'posts_per_page'	=> $size,
        'meta_key'			=> 'view',
        'orderby'			=> ['meta_value_num'=>'DESC'],
      ];
      break;
    case 'comment':
      $arg = [
        'posts_per_page'	=> $size,
        'orderby'			=> 'comment_count',
        'order'				=> 'DESC',
      ];
      break;
    case 'like':
      $arg = [
        'posts_per_page'	=> $size,
        'meta_key'			=> 'like',
        'orderby'			=> ['meta_value_num'=>'DESC'],
      ];
      break;
  }
  $query = new WP_Query($arg);

  return $query;
}

/**
 * @description 查询标签云降序排列
 * @param number $count 查询的数量
 * @param number $hide_empty 隐藏空标签,默认隐藏
 * @return WP_Term[]
 */
function queryTagsDesc($count,$hide_empty=true){
  $tags = get_tags( [
    'taxonomy' => 'post_tag',
    'number' => $count, 
    'orderby' => 'count', 
    'order' => 'DESC',
    'hide_empty' => $hide_empty // for development
  ]);
  return $tags;
}


// /**
//  * @description 查询推荐文章
//  * @param number $postId
//  * @param number $count
//  * @return Array
//  */
// function queryRecommendPostsInfo($postId,$count){
//   $categorys = getCategorysInfo($postId);
//   $category = $categorys[0];
//   $query = new WP_Query([
//     'cat'=>$category->id, //分类id
//     'post__not_in'=>[$postId],
//     'post_type'=>'post',
//     'post_status'=>'publish',
//     'posts_per_page'=>$count,
//     'orderby'=>['rand'],
//   ]);
//   $res = [];
//   if($query->have_posts()){
//     while($query->have_posts()){
//       $query->the_post();
//       $post = [
//         'id'=>get_the_ID(),
//         'title'=>get_the_title(),
//         'url'=>get_the_permalink(),
//       ];
//       array_push($res,$post);
//     }
//   }
//   wp_reset_query();
//   return $res;
// }