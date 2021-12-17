<?php 

  $posts = PostService::queryRecommendPostList(get_the_ID());


?>
<div class="recommend-container">
  <div class="title">相关推荐</div>
  <div class="cut-off"></div>
  <div class="post-list">
    <?php 
      foreach($posts as $post):
    ?>

    <div class="post">
      <i class="fa fa-hand-o-right"></i>
      <a href="<?php echo $post['url'] ?>"><?php echo $post['title'] ?></a>
    </div>

    <?php endforeach; ?>
    
  </div>
</div>