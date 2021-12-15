<?php 

  // $posts = PostService::queryRecommendPostList(get_the_ID());


?>
<div class="recommendCard">
  <div class="recommendCard__title">相关推荐</div>
  <div class="recommendCard__cutOff"></div>
  <div class="recommendCard__postList">
    <?php 
      foreach($posts as $post):
    ?>

    <div class="recommendCard__post">
      <i class="fa fa-hand-o-right"></i>
      <a 
        class="recommendCard__postLink"
        href="#"
      >文章以上的</a>
    </div>

    <?php endforeach; ?>
    
  </div>
</div>