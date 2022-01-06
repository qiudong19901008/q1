<?php 

  use q1\service\PostService;

  // $postList = PostService::queryRecommendPostList(get_the_ID());
  $postList = PostService::queryPostPageRecommendPostList(get_the_ID());

  
?>
<div class="recommendCard">
  <div class="recommendCard__title">相关推荐</div>
  <div class="recommendCard__cutOff"></div>
  <div class="recommendCard__postList">
    <?php 
      foreach($postList as $myPost):
    ?>

    <div class="recommendCard__post">
      <i class="fa fa-hand-o-right"></i>
      <a 
        class="recommendCard__postLink"
        href="<?php echo $myPost['url'] ?>"
      ><?php echo $myPost['title'] ?></a>
    </div>

    <?php endforeach; ?>
    
  </div>
</div>