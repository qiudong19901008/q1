
<div class="comment-list-container">
  <?php 
    // get_template_part('frontend/post/commentList/commentList'); 
    // echo admin_url('admin-ajax.php');
  ?>
</div>















<?php
// $res = CommentDao::query(71,'commen_date','DESC',1,10);
// var_dump($res);

// $arr = [
//   'categoryId'=>null,
// ];

// $res = empty($arr['categoryId']);

// $res = admin_url('admin-ajax.php');

$query = new WP_Query([
  'post_type'=>'post',
  'post_status'=>'publish',
  'posts_per_page'=>1,
]);

if($query->have_posts()){
  while($query->have_posts()){
    $query->the_post();
    global $post;
    var_dump($post);
  }
}



var_dump($res);
// echo $res;

?>


