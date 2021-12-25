<?php

// $res = empty([]);

// global $post;
// 
// $res = getPostThumbUrl($post);

// $res =get_the_post_thumbnail();

// $res = get_the_post_thumbnail_url();

// $res = getQ1Option(Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMBNAIL);

// var_dump($res);

// $res = CommentDao::query(71,'comment_date','DESC',1,10);
// var_dump($res);

// $arr = [
//   'categoryId'=>null,
// ];

// $res = empty($arr['categoryId']);

// $res = admin_url('admin-ajax.php');

// $query = new WP_Query([
//   'post_type'=>'post',
//   'post_status'=>'publish',
//   'posts_per_page'=>1,
// ]);

// if($query->have_posts()){
//   while($query->have_posts()){
//     $query->the_post();
//     global $post;
//     var_dump($post);
//   }
// }
// q1_field_post_view_count
// $res = PostMetaDao::getPostMetaListByPostIdList([71],[
//   Fields::Q1_FIELD_POST_LIKE_COUNT,
//   Fields::Q1_FIELD_POST_VIEW_COUNT,
// ]);

// $res = substr("('abc','bdk',",0,-1);

// $res = PostDao::queryPostList([],null,[71],['meta','author','category'],[Fields::Q1_FIELD_POST_LIKE_COUNT,Fields::Q1_FIELD_POST_VIEW_COUNT],'create_time','DESC',1,1);

// $res = get_categories(); //默认只会查出有文章的分类

// get_category_link(9)


// var_dump($res);
// echo $res;

// $listAndCount = PostDao::queryPostList(
//   [],
//   null,
//   [101],
//   ['meta','author','category','tag'],
//   [
//     Fields::Q1_FIELD_POST_LIKE_COUNT,
//     Fields::Q1_FIELD_POST_VIEW_COUNT,
//   ],
// );
// $res = PostDao::queryRecommendPostList('like',6);
// $res = PostMetaDao::getPostMetaListByPostIdList([71],[
//   Fields::Q1_FIELD_POST_LIKE_COUNT,
//   Fields::Q1_FIELD_POST_VIEW_COUNT,
// ]);
// $res = empty('');

// $myPostList = ['abc'];
// unset($myPostList['0']);
// $myPostList = array_values($myPostList);
// echo count($myPostList);


// 测试metaKey排序
// $listAndCount = PostDao::queryPostList(
//   [],
//   null,
//   null,
//   ['meta'],
//   [Fields::Q1_FIELD_POST_VIEW_COUNT],
//   '',
//   'DESC',
//   1,
//   10,
//   Fields::Q1_FIELD_POST_VIEW_COUNT
// );
// $res = [];
// foreach($listAndCount['list'] as $one){
//   $likeCount = $one['meta'];
//   array_push($res,$likeCount);
// }

// $potions = [];
// $options[] = ['abc'=>'121'];

// $location = apply_filters( 'options_framework_location', array( 'config/options.php' ) );
// $res = Redux::get_option('q1_option','footer_copyright');
// // var_dump($res);
// echo $res;

//   $res = getQ1Option(Options::Q1_OPTION_GLOBAL_FOOTER_MENU);

// var_dump($res);

// $res = get_option('blogname');
// echo $res;

// $res = getSeoTitle();
// var_dump($res);