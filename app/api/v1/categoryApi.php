<?php



add_action( 'rest_api_init', function () {
  register_rest_route( 'q1/v1', '/category/list', [
    'methods' => 'GET',
    'callback' => 'queryCategoryListRouter',
  ]);
});

// post_tag category
function queryCategoryListRouter(){
  $page = getGETValue('page',1);
  $size = getGETValue('size',10);
  $res = CategoryDao::queryCategoryList($page,$size);
  return json_encode($res);
}

